<?php

declare(strict_types=1);

namespace WpWidgets\ClientKami;

/**
 * ClientKami
 * Kelas ini digunakan untuk menampilkan daftar klien kami. Ini bisa diperluas di masa depan untuk menambahkan fungsionalitas rendering klien.
 */
final class ClientKami
{

    /**
     * Konstruktor default untuk kelas ClientKami.
     */
    public function __construct() {}

    /**
     * Merender daftar klien menjadi string HTML. Saat ini mengembalikan string kosong.
     *
     * @return string Representasi HTML dari daftar klien.
     */
    public function render(): string
    {
        return '';
    }
}
