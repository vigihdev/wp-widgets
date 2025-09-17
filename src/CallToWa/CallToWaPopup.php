<?php

declare(strict_types=1);

namespace WpWidgets\CallToWa;


use Yiisoft\Html\Html;


/**
 * CallToWaPopup
 * Kelas untuk membuat widget tombol 'Call to WhatsApp' yang menampilkan popup WhatsApp.
 */
final class CallToWaPopup
{
    /**
     * CallToWaPopup constructor.
     *
     * @param string $imgUrl The URL of the image to be displayed.
     */
    public function __construct(
        protected readonly string $imgUrl
    ) {}

    /**
     * Renders the CallToWa widget.
     *
     * @return string The HTML string of the rendered widget.
     */
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
