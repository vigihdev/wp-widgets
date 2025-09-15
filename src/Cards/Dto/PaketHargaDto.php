<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Dto;

use WpWidgets\Cards\Contract\PaketHargaInterface;

final class PaketHargaDto implements PaketHargaInterface
{


    public function __construct(
        private readonly int $harga,
        private readonly string $nama_paket
    ) {}

    public function getHarga(): int
    {
        return $this->harga;
    }

    public function getNamaPaket(): string
    {
        return $this->nama_paket;
    }
}
