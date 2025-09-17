<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Dto;

use WpWidgets\Cards\Contract\LayananKamiInterface;

/**
 * LayananKamiDto
 * Data Transfer Object (DTO) untuk merepresentasikan detail layanan kami.
 */
class LayananKamiDto implements LayananKamiInterface
{
    /**
     * Konstruktor LayananKamiDto.
     *
     * @param string $title Judul layanan.
     * @param string $description Deskripsi layanan.
     * @param string $filename Nama file gambar ikon layanan.
     * @param string $url URL tautan untuk detail layanan.
     */
    public function __construct(
        private string $title,
        private string $description,
        private string $filename,
        private string $url
    ) {}

    /**
     * Mengembalikan judul layanan.
     *
     * @return string Judul layanan.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Mengembalikan deskripsi layanan.
     *
     * @return string Deskripsi layanan.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Mengembalikan nama file gambar ikon layanan.
     *
     * @return string Nama file gambar.
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Mengembalikan URL tautan untuk detail layanan.
     *
     * @return string URL layanan.
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
