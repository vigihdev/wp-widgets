<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Contract;

interface PaketHargaInterface
{

    public function getHarga(): int;

    public function getNamaPaket(): string;
}
