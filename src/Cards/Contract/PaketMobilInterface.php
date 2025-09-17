<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Contract;

/**
 * PaketMobilInterface
 * Antarmuka untuk merepresentasikan data paket mobil.
 */
interface PaketMobilInterface
{

    /**
     * Mengembalikan nama mobil.
     *
     * @return string Nama mobil.
     */
    public function getNamaMobil(): string;

    /**
     * Mengembalikan nama file gambar mobil.
     *
     * @return string Nama file gambar.
     */
    public function getFilename(): string;
}
