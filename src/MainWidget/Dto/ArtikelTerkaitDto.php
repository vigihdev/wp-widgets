<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget\Dto;

final class ArtikelTerkaitDto
{

    public function __construct(
        private readonly string $imageUrl,
        private readonly string $title,
        private readonly string $snippet,
        private readonly string $url
    ) {}

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSnippet(): string
    {
        return $this->snippet;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
