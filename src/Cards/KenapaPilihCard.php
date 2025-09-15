<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class KenapaPilihCard extends BaseCard
{

    private array $items = [];

    protected static function getName(): string
    {
        return 'kenapa-pilih-card';
    }

    public function __construct(
        private readonly string $basePathImg
    ) {}

    public function add(string $iconName, string $title, string $description): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            ['iconName' => $iconName, 'title' => $title, 'description' => $description]
        ]);

        return $this;
    }

    public function render(): string
    {

        $items = [];

        foreach ($this->items as $i => $item) {
            $title = $item['title'];
            $description = $item['description'];
            $uriFile = $this->basePathImg . DIRECTORY_SEPARATOR . $item['iconName'];

            $imgFile = Html::img($uriFile, "{$title}", [
                'class' => 'img-media lazyload',
                'fetchpriority' => 'high',
                'width' => 150,
                'height' => 110
            ]);

            $items[] = implode(PHP_EOL, [
                Html::openTag('div', ['class' => self::getName()]),

                Html::openTag('div', ['class' => 'card-media']),
                Html::div($imgFile, ['class' => 'media-object media-object-' . $i])->encode(false)->render(),
                Html::closeTag('div'),

                Html::div($title, ['class' => 'text-title'])->encode(false)->render(),
                Html::div($description, ['class' => 'text-description'])->encode(false)->render(),
                Html::closeTag('div'),
            ]);
        }

        return implode('', $items);
    }
}
