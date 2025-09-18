<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget\Dto;

final class ShareItDto
{

    public function __construct(
        private readonly string $name,
        private readonly string $icon,
        private readonly string $url
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
