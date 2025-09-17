<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar;

use Yiisoft\Html\Html;

abstract class BaseSidebar
{

    abstract protected static function getName(): string;


    abstract public function render(): string;


    protected function renderWidgetTitle(string $title): string
    {
        return implode('', [
            Html::openTag('div', ['class' => static::getName() . '-title']),
            Html::tag('h3', $title, ['class' => 'widget-title']),
            Html::closeTag('div'),
        ]);
    }
}
