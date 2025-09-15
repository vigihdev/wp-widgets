<?php

declare(strict_types=1);

namespace WpWidgets\ConnectWithUs;


use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;

final class ConnectWithUs
{

    private array $items = [];

    public function __construct(
        protected readonly string $baseUrlImg
    ) {}

    public function add(string $filename, string $url): self
    {
        $this->items = ArrayHelper::merge($this->items, [['filename' => $filename, 'url' => $url]]);
        return $this;
    }

    public function render(): string
    {

        $items = [];
        foreach ($this->items as $value) {

            $filename = $value['filename'];
            $class = preg_replace('/\.\w+$/', '', $filename) . ' lazyload';
            $alt = (new Inflector())->toWords(preg_replace('/\.\w+$/', '', $filename));
            $uri = $this->baseUrlImg . DIRECTORY_SEPARATOR . $value['filename'];
            $url = $value['url'];

            $items[] = Html::img($uri, $alt, [
                'class' => $class . ' ripple-effect',
                'title' => $alt
            ]);
        }

        $item = implode('', $items);

        return
            Html::div($item, [
                'class' => 'connect-with-us-items'
            ])
            ->encode(false)
            ->render();
    }
}
