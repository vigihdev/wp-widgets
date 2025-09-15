<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Contract;

interface DaftarHargaInterface
{
    /**
     * Get nama mobil
     *
     * @return string Nama mobil
     */
    public function getNamaMobil(): string;

    /**
     * Get harga sewa
     *
     * @return int Harga sewa dalam rupiah
     */
    public function getHarga(): int;

    /**
     * Get paket harga
     *
     * @return string Jenis paket harga
     */
    public function getPaketHarga(): string;
}
