<?php

declare(strict_types=1);

namespace WpWidgets\ContactInfo;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;


final class ContactInfo
{

    private array $items = [];

    public function __construct(
        protected readonly string $baseUrlImg
    ) {}

    public function add(string $filename, string $content): self
    {
        $this->items = ArrayHelper::merge($this->items, [
            ['filename' => $filename, 'content' => $content]
        ]);
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
            $content = $value['content'];

            $item = implode('', [
                Html::img($uri, $alt, [
                    'class' => 'contact-info-icon ' . $class,
                    'title' => $alt
                ]),
                Html::span($content, ['class' => 'contact-info-text'])
            ]);

            $items[] = Html::div($item, [
                'class' => 'contact-info-group ripple-effect'
            ])->encode(false);
        }

        $item = implode('', $items);

        return
            Html::div($item, [
                'class' => 'contact-info-items'
            ])
            ->encode(false)
            ->render();
    }
}
