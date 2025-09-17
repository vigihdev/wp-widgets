<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar;

use Yiisoft\Html\Html;

final class FastResponse extends BaseSidebar
{


    protected static function getName(): string
    {
        return 'fast-response-widget';
    }

    public function __construct(
        protected readonly string $baseUrlIcon
    ) {}

    public function add(string $iconName, string $content): self
    {
        return $this;
    }

    public function render(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            $this->renderWidgetTitle('Fast Response'),
            Html::closeTag('div'),
        ]);
    }
}
