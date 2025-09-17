<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Dto;

use WpWidgets\Cards\Contract\PaketHargaInterface;

/**
 * PaketHargaDto
 * Data Transfer Object (DTO) untuk merepresentasikan detail paket harga.
 */
final class PaketHargaDto implements PaketHargaInterface
{


    /**
     * Konstruktor PaketHargaDto.
     *
     * @param int $harga Harga paket.
     * @param string $namaPaket Nama paket harga.
     */
    public function __construct(
        private readonly int $harga,
        private readonly string $namaPaket
    ) {}

    /**
     * Mengembalikan harga paket.
     *
     * @return int Harga paket.
     */
    public function getHarga(): int
    {
        return $this->harga;
    }

    /**
     * Mengembalikan nama paket.
     *
     * @return string Nama paket.
     */
    public function getNamaPaket(): string
    {
        return $this->namaPaket;
    }
}
