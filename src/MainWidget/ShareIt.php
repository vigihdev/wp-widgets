<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget;

use Yiisoft\Html\Html;

final class ShareIt extends BaseMainWidget
{

    protected static function getName(): string
    {
        return 'share-it-widget';
    }

    public function __construct() {}


    public function render(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            'hello share it',
            Html::closeTag('div'),
        ]);
    }
}
