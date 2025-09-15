<?php

declare(strict_types=1);

namespace WpWidgets\QuickLink;

use WP_Post;
use WP_Query;
use Yiisoft\Html\Html;

final class RandomPost
{

    public function __construct() {}

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

    private function getImgDefault(): string
    {
        return get_template_directory_uri() .
            DIRECTORY_SEPARATOR .
            'images/no-image.webp';
    }


    /**
     *
     * @return WP_Post[]
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

    private function debug($param)
    {
        echo '<pre style="background: #fff;">';
        var_dump($param);
        echo '</pre>';
    }
}
