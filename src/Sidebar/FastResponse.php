<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar;

use WpWidgets\Sidebar\Dto\FastResponseDto;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class FastResponse extends BaseSidebar
{


    /**
     * @var FastResponseDto[] $items
     */
    private array $items = [];

    protected static function getName(): string
    {
        return 'fast-response-widget';
    }

    public function __construct() {}

    public function add(FastResponseDto $fast)
    {
        $this->items = ArrayHelper::merge($this->items, [$fast]);
        return $this;
    }

    public function render(): string
    {

        $items = [];
        foreach ($this->items as $item) {

            $icon = implode('', [
                Html::openTag('div', ['class' => 'fast-response-icon']),
                Html::img($item->getIconUrl(), '', [
                    'class' => 'img-media',
                    'width' => 24,
                    'height' => 24,
                ]),
                Html::closeTag('div'),
            ]);

            $content = implode('', [
                Html::openTag('div', ['class' => 'fast-response-text']),
                Html::span($item->getContent(), ['class' => 'text-content']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', ['class' => 'fast-response-group ripple-effect group-' . $item->getName()]),
                $icon,
                $content,
                Html::closeTag('div'),
            ]);
        }

        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            $this->renderWidgetTitle('Fast Response'),
            implode('', $items),
            Html::closeTag('div'),
        ]);
    }
}
