<?php

declare(strict_types=1);

namespace WpWidgets\BackToTop;


use Yiisoft\Html\Html;

final class BackToTop
{

    public function __construct() {}


    /**
     *
     * @return string
     */
    public function render(): string
    {

        return implode('', [
            Html::openTag('div', ['class' => 'back-to-top-widget ripple-effect']),
            Html::openTag('div', ['id' => 'back-to-top', 'class' => 'back-to-top-icon ripple-effect']),
            Html::span('arrow_upward', ['class' => 'material-icons-outlined ripple-effect']),
            Html::closeTag('div'),
            Html::closeTag('div'),
        ]);
    }
}
