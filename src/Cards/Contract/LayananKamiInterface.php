<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Contract;

/**
 * LayananKamiInterface
 * Antarmuka untuk merepresentasikan data layanan kami.
 */
interface LayananKamiInterface
{

    /**
     * Mengembalikan judul layanan.
     *
     * @return string Judul layanan.
     */
    public function getTitle(): string;
    /**
     * Mengembalikan deskripsi layanan.
     *
     * @return string Deskripsi layanan.
     */
    public function getDescription(): string;
    /**
     * Mengembalikan nama file gambar layanan.
     *
     * @return string Nama file gambar.
     */
    public function getFilename(): string;
    /**
     * Mengembalikan URL tautan untuk layanan.
     *
     * @return string URL layanan.
     */
    public function getUrl(): string;
}
