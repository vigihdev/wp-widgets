<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar;

use Yiisoft\Html\Html;

final class CabangRental extends BaseSidebar
{


    protected static function getName(): string
    {
        return 'cabang-rental-widget';
    }

    public function __construct() {}

    public function render(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            $this->renderWidgetTitle('Cabang Rental'),
            Html::closeTag('div'),
        ]);
    }
}
