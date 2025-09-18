<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar\Dto;


final class PostTerbaruDto {

    /**
     * Create a new PostTerbaruDto instance.
     * @param string $imageUrl URL gambar post terbaru
     * @param string $title Judul post terbaru
     * @param string $snippet Cuplikan singkat post terbaru
     * @param string $postUrl URL menuju post terbaru
     * @return self
     */
    public static function create(string $imageUrl, string $title, string $snippet, string $postUrl): self
    {
        return new self($imageUrl, $title, $snippet, $postUrl);
    }

    /**
     * Data Transfer Object untuk Post Terbaru pada Sidebar.
     *
     * @package WpWidgets\Sidebar\Dto
     *
     * @property-read string $imageUrl  URL gambar post terbaru
     * @property-read string $title     Judul post terbaru
     * @property-read string $snippet   Cuplikan singkat post terbaru
     * @property-read string $postUrl   URL menuju post terbaru
     */
    public function __construct(
        private readonly string $imageUrl,
        private readonly string $title,
        private readonly string $snippet,
        private readonly string $postUrl
    ) {}

    /**
     * Getter untuk URL gambar post terbaru.
     * @return string URL gambar post terbaru
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Getter untuk judul post terbaru.
     * @return string Judul post terbaru
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Getter untuk cuplikan singkat post terbaru.
     * @return string Cuplikan singkat post terbaru
     */
    public function getSnippet(): string
    {
        return $this->snippet;
    }

    /**
     * Getter untuk URL menuju post terbaru.
     * @return string URL menuju post terbaru
     */
    public function getPostUrl(): string
    {
        return $this->postUrl;
    }
}
