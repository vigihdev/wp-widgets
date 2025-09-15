<?php

declare(strict_types=1);

namespace WpWidgets\CallToWa;


use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;


final class WhatsappPopup
{

    private array $items = [];

    public function __construct(
        private readonly string $title
    ) {}

    public function add(string $iconUrl, string $username, string $no_hp): self
    {
        $this->items = ArrayHelper::merge($this->items, [
            ['iconUrl' => $iconUrl, 'username' => $username, 'no_hp' => $no_hp]
        ]);
        return $this;
    }

    public function render(): string
    {

        return implode('', [
            Html::openTag('div', ['id' => 'call-to-wa-popup', 'class' => 'call-to-wa-popup collapse animate__animated animate__slideInUp']),
            Html::openTag('div', ['class' => 'whatsapp-popup-group']),

            Html::openTag('div', ['class' => 'whatsapp-popup-header']),
            Html::span('close', [
                'class' => 'material-icons-outlined whatsapp-popup-close ripple-effect',
                'data-toggle' => "collapse",
                'data-target' => "#call-to-wa-popup",
                'aria-expanded' => "false",
                'aria-controls' => "call-to-wa-popup"
            ]),
            Html::div($this->title, ['class' => 'whatsapp-popup-header-title']),
            Html::closeTag('div'),

            Html::openTag('div', ['class' => 'whatsapp-popup-container']),
            $this->renderItems(),
            Html::closeTag('div'),

            Html::closeTag('div'), // whatsapp-popup-group
            Html::closeTag('div'),
        ]);
    }

    private function renderItems(): string
    {

        $items = [];
        foreach ($this->items as $item) {
            $media = implode('', [
                Html::openTag('div', ['class' => 'whatsapp-popup-media']),

                Html::img($item['iconUrl'], 'whatsapp', ['class' => 'whatsapp-popup-icon ripple-effect whatsapp']),
                Html::div('', ['class' => 'circle-online']),

                Html::closeTag('div'),
            ]);

            $content = implode('', [
                Html::openTag('div', ['class' => 'whatsapp-popup-content']),
                Html::div($item['username'], ['class' => 'username']),
                Html::div($item['no_hp'], ['class' => 'no-hp']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', [
                    'class' => 'whatsapp-popup-items ripple-effect'
                ]),
                $media,
                $content,
                Html::closeTag('div'),
            ]);
        }

        return implode('', $items);
    }
}
