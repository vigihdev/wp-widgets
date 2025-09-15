<?php

declare(strict_types=1);

namespace WpWidgets\CallToWa;


use Yiisoft\Html\Html;


final class CallToWaPopup
{

    public function __construct(
        protected readonly string $imgUrl
    ) {}

    public function render(): string
    {

        return implode('', [
            Html::openTag('div', ['class' => 'call-to-wa-widget']),
            Html::openTag('div', ['class' => 'call-to-wa-icon ripple-effect']),

            Html::img($this->imgUrl, 'whatsapp', [
                'type' => 'button',
                'class' => 'call-to-wa-img ripple-effect lazyload',
                'width' => 50,
                'height' => 50,
                'data-toggle' => 'collapse',
                'data-target' => '#call-to-wa-popup',
                'aria-expanded' => 'false',
                'aria-controls' => 'call-to-wa-popup',
                'fetchpriority' => 'high'
            ]),
            Html::closeTag('div'),
            Html::closeTag('div'),
        ]);
    }
}
