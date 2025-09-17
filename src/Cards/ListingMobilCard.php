<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use Yiisoft\Arrays\ArrayHelper;

/**
 * ListingMobilCard
 * Kelas ini memperluas `BaseCard` untuk menampilkan kartu listing mobil.
 * Setiap kartu menampilkan gambar mobil, judul, deskripsi, dan URL tautan.
 */
final class ListingMobilCard extends BaseCard
{
    /**
     * @var array $items Array yang menyimpan daftar item listing mobil.
     */
    private array $items = [];

    /**
     * Mengembalikan nama unik untuk jenis kartu ini.
     *
     * @return string Nama jenis kartu.
     */
    protected static function getName(): string
    {
        return 'listing-mobil-card';
    }

    /**
     * Konstruktor ListingMobilCard.
     *
     * @param string $basePathImg Path dasar ke direktori yang berisi gambar mobil.
     */
    public function __construct(
        private readonly string $basePathImg
    ) {}

    /**
     * Menambahkan item listing mobil baru ke daftar kartu.
     *
     * @param string $filename Nama file gambar mobil.
     * @param string $title Judul listing mobil.
     * @param string $description Deskripsi singkat mobil.
     * @param string $url URL tautan ke detail mobil.
     * @return self Instance ListingMobilCard saat ini untuk chaining method.
     */
    public function add(string $filename, string $title, string $description, string $url): self
    {
        $this->items = ArrayHelper::merge($this->items, [
            ['filename' => $filename, 'title' => $title, 'description' => $description, 'url' => $url]
        ]);

        return $this;
    }

    /**
     * Merender daftar kartu listing mobil menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar kartu listing mobil.
     */
    public function render(): string
    {
        $items = [];

        return implode('', $items);
    }
}
