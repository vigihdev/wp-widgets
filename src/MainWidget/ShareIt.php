<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget;

use WpWidgets\MainWidget\Dto\ShareItDto;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;

final class ShareIt extends BaseMainWidget
{


    /**
     * @var ShareItDto[] $items
     */
    private array $items = [];

    protected static function getName(): string
    {
        return 'share-it-widget';
    }

    public function __construct(
        protected readonly string $baseUrlIcon
    ) {}

    public function add(string $name, string $icon, string $url): self
    {
        $this->items = ArrayHelper::merge($this->items, [
            new ShareItDto($name, $this->baseUrlIcon . DIRECTORY_SEPARATOR . $icon, $url)
        ]);
        return $this;
    }

    public function render(): string
    {

        $items = [];
        foreach ($this->items as $item) {
            $items[] = implode('', [
                Html::openTag('img', [
                    'class' => 'ripple-effect shareit-icon' . ' ' . (new Inflector())->pascalCaseToId($item->getName()),
                    'alt' => $item->getName(),
                    'src' => $item->getIcon(),
                ]),
                Html::closeTag('img'),
            ]);
        }

        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            $this->renderWidgetTitle('Share'),

            Html::openTag('div', ['class' => self::getName() . '-content']),
            implode('', $items),
            Html::closeTag('div'),

            Html::closeTag('div'),
        ]);
    }
}
