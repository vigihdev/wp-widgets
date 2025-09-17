<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

/**
 * KenapaPilihCard
 * Kelas ini memperluas `BaseCard` untuk menampilkan kartu dengan alasan 'Kenapa Memilih Kami'.
 * Setiap kartu menampilkan ikon, judul, dan deskripsi.
 */
final class KenapaPilihCard extends BaseCard
{

    /**
     * @var array $items Array yang menyimpan daftar item 'Kenapa Pilih Kami'.
     */
    private array $items = [];

    /**
     * Mengembalikan nama unik untuk jenis kartu ini.
     *
     * @return string Nama jenis kartu.
     */
    protected static function getName(): string
    {
        return 'kenapa-pilih-card';
    }

    /**
     * Konstruktor KenapaPilihCard.
     *
     * @param string $basePathImg Path dasar ke direktori yang berisi gambar ikon.
     */
    public function __construct(
        private readonly string $basePathImg
    ) {}

    /**
     * Menambahkan item 'Kenapa Pilih Kami' baru ke daftar kartu.
     *
     * @param string $iconName Nama file ikon.
     * @param string $title Judul item.
     * @param string $description Deskripsi item.
     * @return self Instance KenapaPilihCard saat ini untuk chaining method.
     */
    public function add(string $iconName, string $title, string $description): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            ['iconName' => $iconName, 'title' => $title, 'description' => $description]
        ]);

        return $this;
    }

    /**
     * Merender daftar kartu 'Kenapa Pilih Kami' menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar kartu.
     */
    public function render(): string
    {

        $items = [];

        foreach ($this->items as $i => $item) {
            $title = $item['title'];
            $description = $item['description'];
            $uriFile = $this->basePathImg . DIRECTORY_SEPARATOR . $item['iconName'];

            $imgFile = Html::img($uriFile, "{$title}", [
                'class' => 'img-media lazyload',
                'fetchpriority' => 'high',
                'width' => 150,
                'height' => 110
            ]);

            $items[] = implode(PHP_EOL, [
                Html::openTag('div', ['class' => self::getName()]),

                Html::openTag('div', ['class' => 'card-media']),
                Html::div($imgFile, ['class' => 'media-object media-object-' . $i])->encode(false)->render(),
                Html::closeTag('div'),

                Html::div($title, ['class' => 'text-title'])->encode(false)->render(),
                Html::div($description, ['class' => 'text-description'])->encode(false)->render(),
                Html::closeTag('div'),
            ]);
        }

        return implode('', $items);
    }
}
