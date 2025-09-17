<?php

declare(strict_types=1);

namespace WpWidgets\QuickLink;

use WP_Post;
use WP_Query;
use Yiisoft\Html\Html;

/**
 * RandomPost
 * Kelas ini digunakan untuk menampilkan daftar postingan WordPress secara acak sebagai 'quick links'.
 * Ini mengambil beberapa postingan acak dan merendernya dalam format HTML yang dapat diklik.
 */
final class RandomPost
{

    /**
     * Konstruktor default untuk kelas RandomPost.
     */
    public function __construct() {}

    /**
     * Merender daftar postingan acak menjadi string HTML.
     *
     * Ini mengambil postingan acak, membuat elemen HTML untuk setiap postingan,
     * dan mengembalikannya sebagai string.
     *
     * @return string Representasi HTML dari daftar postingan acak.
     */
    public function render(): string
    {

        $items = [];
        foreach ($this->getPosts() as $post) {
            $title = $post->post_title;
            $post_content = $post->post_content;
            $permalink = get_permalink($post->ID);

            $groupItem = implode('', [
                Html::div($title, ['class' => 'random-posts-title']),
                Html::div('', ['class' => 'random-posts-divider']),
            ]);

            $imgUri = $this->getImgDefault();
            $imgMedia = Html::img($imgUri, $title, [
                'class' => 'img-media',
            ]);

            $media = Html::div($imgMedia, ['class' => 'random-posts-media'])->encode(false);
            $group = Html::div($groupItem, ['class' => 'random-posts-group'])->encode(false);

            $content = implode('', [$media, $group]);

            $items[] = Html::div($content, [
                'class' => 'random-posts-item ripple-effect',
                'onclick' => "location.href='{$permalink}'"
            ])
                ->encode(false)
                ->render();
        }

        return implode('', $items);
    }

    /**
     * Mengembalikan URI gambar default jika tidak ada gambar thumbnail untuk postingan.
     *
     * @return string URI gambar default.
     */
    private function getImgDefault(): string
    {
        return get_template_directory_uri() .
            DIRECTORY_SEPARATOR .
            'images/no-image.webp';
    }


    /**
     * Mengambil daftar postingan WordPress acak.
     *
     * @return WP_Post[] Array objek WP_Post yang berisi postingan acak.
     */
    private function getPosts(): array
    {

        $posts = [];
        $args = array(
            'orderby' => 'rand',
            'posts_per_page' => 5,
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) {
            foreach ($query->get_posts() as $post) {
                if ($post instanceof WP_Post) {
                    $posts[] = $post;
                }
            }
        }

        return $posts;
    }

    /**
     * Fungsi debug untuk mencetak variabel ke output dengan format pre.
     *
     * @param mixed $param Variabel yang akan dicetak.
     */
    private function debug($param)
    {
        echo '<pre style="background: #fff;">';
        var_dump($param);
        echo '</pre>';
    }
}
