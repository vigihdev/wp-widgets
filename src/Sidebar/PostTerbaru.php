<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar;

use WpWidgets\Sidebar\Dto\PostTerbaruDto;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class PostTerbaru extends BaseSidebar
{

    /**
     * @var PostTerbaruDto[] $items
     */
    private array $items = [];

    protected static function getName(): string
    {
        return 'post-terbaru-widget';
    }

    public function __construct() {}

    public function add(PostTerbaruDto $post)
    {
        $this->items = ArrayHelper::merge($this->items, [$post]);
        return $this;
    }

    public function render(): string
    {

        $items = [];
        foreach ($this->items as $item) {

            $media = implode('', [
                Html::openTag('div', ['class' => 'post-terbaru-media']),
                Html::img($item->getImageUrl(), $item->getTitle(), [
                    'class' => 'img-media',
                    'width' => 100,
                    'height' => 100,
                ]),
                Html::closeTag('div'),
            ]);

            $title = implode('', [
                Html::openTag('div', ['class' => 'post-terbaru-title']),
                Html::span($item->getTitle(), ['class' => 'text-title']),
                Html::closeTag('div'),
            ]);

            $snippet = implode('', [
                Html::openTag('div', ['class' => 'post-terbaru-snippet none']),
                Html::span($item->getSnippet(), ['class' => 'text-content']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', ['class' => 'post-terbaru-card ripple-effect']),
                $media,
                Html::openTag('div', ['class' => 'post-terbaru-body']),
                $title,
                $snippet,
                Html::closeTag('div'),

                Html::closeTag('div'),
            ]);
        }

        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            $this->renderWidgetTitle('Post Terbaru'),
            Html::openTag('div', ['class' => self::getName() . '-content']),
            implode('', $items),
            Html::closeTag('div'),

            Html::closeTag('div'),
        ]);
    }
}
