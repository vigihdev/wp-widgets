<?php

declare(strict_types=1);

namespace WpWidgets\CaraPesan;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class CaraPesan
{

    protected array $items = [];

    protected static function getName(): string
    {
        return 'cara-pesan-card';
    }


    public function add(string $title, string $description): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            ['title' => $title, 'description' => $description]
        ]);
        return $this;
    }

    public function render(): string
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            $title = $item['title'];
            $description = $item['description'];

            $groupNumber = implode('', [
                Html::openTag('div', ['class' => 'item-group item-group-number']),
                Html::div(
                    Html::span((string)($i + 1), ['class' => 'text-number']),
                    ['class' => 'item-numbered']
                )->encode(false)->render(),
                Html::closeTag('div'),
            ]);

            $groupList = implode('', [
                Html::openTag('div', ['class' => 'item-group item-group-list']),
                Html::div($title, ['class' => 'item-title']),
                Html::div($description, ['class' => 'item-description']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', ['class' => 'cara-pesan-card' . ($i === 0 ? ' active' : null)]),
                Html::openTag('div', ['class' => 'cara-pesan-group']),
                $groupNumber,
                $groupList,
                Html::closeTag('div'),
                Html::closeTag('div'),
            ]);
        }

        return implode('', $items);
    }
}
