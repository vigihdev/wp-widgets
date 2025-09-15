<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Contract;

interface LayananKamiInterface
{

    public function getTitle(): string;
    public function getDescription(): string;
    public function getFilename(): string;
    public function getUrl(): string;
}
