<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use Yiisoft\Arrays\ArrayHelper;

final class ListingMobilCard extends BaseCard
{

    private array $items = [];

    protected static function getName(): string
    {
        return 'listing-mobil-card';
    }

    public function __construct(
        private readonly string $basePathImg
    ) {}

    public function add(string $filename, string $title, string $description, string $url): self
    {
        $this->items = ArrayHelper::merge($this->items, [
            ['filename' => $filename, 'title' => $title, 'description' => $description, 'url' => $url]
        ]);

        return $this;
    }

    public function render(): string
    {
        $items = [];

        return implode('', $items);
    }
}
