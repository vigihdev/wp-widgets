<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use Yiisoft\Html\Html;

abstract class BaseCard
{
    abstract protected static function getName(): string;
    abstract public function render(): string;

    protected function buildBtnAction(array $options = []): string
    {
        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'list-item btn-action']),
            Html::button('Pesan Sekarang', ['class' => 'btn btn-dark btn-block']),
            Html::closeTag('div'),
        ]);
    }
}
