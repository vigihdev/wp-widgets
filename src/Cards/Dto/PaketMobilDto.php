<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Dto;

use WpWidgets\Cards\Contract\PaketMobilInterface;

/**
 * PaketMobilDto
 * Data Transfer Object (DTO) untuk merepresentasikan detail paket mobil.
 */
final class PaketMobilDto implements PaketMobilInterface
{


    /**
     * Konstruktor PaketMobilDto.
     *
     * @param string $namaMobil Nama mobil.
     * @param string $filename Nama file gambar mobil.
     */
    public function __construct(
        private readonly string $namaMobil,
        private readonly string $filename
    ) {}

    /**
     * Mengembalikan nama mobil.
     *
     * @return string Nama mobil.
     */
    public function getNamaMobil(): string
    {
        return $this->namaMobil;
    }

    /**
     * Mengembalikan nama file gambar mobil.
     *
     * @return string Nama file gambar.
     */
    public function getFilename(): string
    {
        return $this->filename;
    }
}
