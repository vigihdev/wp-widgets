<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar\Dto;

/**
 * Data Transfer Object untuk Fast Response pada Sidebar.
 *
 * @package WpWidgets\Sidebar\Dto
 *
 * @property-read string $name Name
 * @property-read string $iconUrl URL icon
 * @property-read string $content Content
 * @property-read string|null $actionUrl URL action
 * @property-read array $options Options
 */
final class FastResponseDto
{

    /**
     * Create a new FastResponseDto instance.
     * @param string $iconUrl URL icon
     * @param string $name Name
     * @param string $content Content
     * @param string|null $actionUrl URL action
     * @param array $options Options
     * @return self
     */
    public static function create(string $name, string $iconUrl, string $content, ?string $actionUrl = null, array $options = []): self
    {
        return new self($name, $iconUrl, $content, $actionUrl, $options);
    }

    /**
     * Create a new FastResponseDto instance.
     * @param string $name Name
     * @param string $iconUrl URL icon
     * @param string $content Content
     * @param string $actionUrl URL action
     * @param array $options Options
     * @return self
     */
    public function __construct(
        private readonly string $name,
        private readonly string $iconUrl,
        private readonly string $content,
        private readonly ?string $actionUrl = null,
        private readonly array $options = []
    ) {}

    /**
     * Getter untuk name.
     * @return string Name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Getter untuk URL icon.
     * @return string URL icon
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * Getter untuk content.
     * @return string Content
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Getter untuk URL action.
     * @return string|null URL action
     */
    public function getActionUrl(): ?string
    {
        return $this->actionUrl;
    }

    /**
     * Getter untuk options.
     * @return array Options
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
