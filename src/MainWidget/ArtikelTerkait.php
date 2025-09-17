<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget;

use Yiisoft\Html\Html;

final class ArtikelTerkait extends BaseMainWidget
{

    protected static function getName(): string
    {
        return 'artikel-terkait-widget';
    }

    public function __construct() {}


    public function render(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            'hello artikel terkait',
            Html::closeTag('div'),
        ]);
    }
}
