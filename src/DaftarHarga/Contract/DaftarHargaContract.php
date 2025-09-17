<?php

declare(strict_types=1);

namespace WpWidgets\DaftarHarga\Contract;

interface DaftarHargaContract
{

    public function getNamaMobil(): string;

    public function getHarga(): int;

    public function getUriImageMobil(): string;

    public function getUriActionButton(): string;
}
