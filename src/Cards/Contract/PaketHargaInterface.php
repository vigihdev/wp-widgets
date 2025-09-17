<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Contract;

/**
 * PaketHargaInterface
 * Antarmuka untuk merepresentasikan data paket harga.
 */
interface PaketHargaInterface
{

    /**
     * Mengembalikan harga paket.
     *
     * @return int Harga paket.
     */
    public function getHarga(): int;

    /**
     * Mengembalikan nama paket.
     *
     * @return string Nama paket.
     */
    public function getNamaPaket(): string;
}
