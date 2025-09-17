<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget;

use Yiisoft\Html\Html;

abstract class BaseMainWidget
{

    abstract public function render(): string;

    abstract protected static function getName(): string;
}
