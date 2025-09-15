<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Dto;

use WpWidgets\Cards\Contract\PaketMobilInterface;

final class PaketMobilDto implements PaketMobilInterface
{


    public function __construct(
        private readonly string $filename,
        private readonly string $nama_mobil
    ) {}

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getNamaMobil(): string
    {
        return $this->nama_mobil;
    }
}
