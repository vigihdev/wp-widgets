<?php

declare(strict_types=1);

namespace WpWidgets\CaraPesan;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

/**
 * CaraPesan
 * Kelas ini digunakan untuk menampilkan langkah-langkah atau cara pemesanan dalam bentuk kartu (card).
 * Cocok digunakan untuk widget yang memandu pengguna melalui sebuah proses.
 */
final class CaraPesan
{
    /**
     * @var array $items Array yang menyimpan daftar langkah-langkah pemesanan.
     */
    protected array $items = [];

    /**
     * Konstruktor default untuk kelas CaraPesan.
     */
    public function __construct() {}

    /**
     * Mengembalikan nama unik untuk kelas ini.
     *
     * @return string Nama kelas.
     */
    protected static function getName(): string
    {
        return 'cara-pesan-card';
    }

    /**
     * Menambahkan langkah pemesanan baru ke daftar.
     *
     * @param string $title Judul langkah pemesanan.
     * @param string $description Deskripsi detail langkah pemesanan.
     * @return self Instance CaraPesan saat ini untuk chaining method.
     */
    public function add(string $title, string $description): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            ['title' => $title, 'description' => $description]
        ]);
        return $this;
    }

    /**
     * Merender daftar langkah pemesanan menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar langkah pemesanan.
     */
    public function render(): string
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            $title = $item['title'];
            $description = $item['description'];

            $groupNumber = implode('', [
                Html::openTag('div', ['class' => 'item-group item-group-number']),
                Html::div(
                    Html::span((string)($i + 1), ['class' => 'text-number']),
                    ['class' => 'item-numbered']
                )->encode(false)->render(),
                Html::closeTag('div'),
            ]);

            $groupList = implode('', [
                Html::openTag('div', ['class' => 'item-group item-group-list']),
                Html::div($title, ['class' => 'item-title']),
                Html::div($description, ['class' => 'item-description']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', ['class' => 'cara-pesan-card' . ($i === 0 ? ' active' : null)]),
                Html::openTag('div', ['class' => 'cara-pesan-group']),
                $groupNumber,
                $groupList,
                Html::closeTag('div'),
                Html::closeTag('div'),
            ]);
        }

        return implode('', $items);
    }
}
