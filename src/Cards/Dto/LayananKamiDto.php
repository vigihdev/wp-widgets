<?php

declare(strict_types=1);

namespace WpWidgets\Cards\Dto;

use WpWidgets\Cards\Contract\LayananKamiInterface;

class LayananKamiDto implements LayananKamiInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private string $filename,
        private string $url
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
