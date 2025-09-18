<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget;

use Yiisoft\Html\Html;

abstract class BaseMainWidget
{

    abstract public function render(): string;

    abstract protected static function getName(): string;

    protected function renderWidgetTitle(string $title): string
    {
        return implode('', [
            Html::openTag('div', ['class' => static::getName() . '-title']),
            Html::tag('h3', $title, ['class' => 'widget-title']),
            Html::closeTag('div'),
        ]);
    }
}
