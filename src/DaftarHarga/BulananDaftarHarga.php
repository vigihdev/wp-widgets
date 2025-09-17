<?php

declare(strict_types=1);

namespace WpWidgets\DaftarHarga;

use Yiisoft\Html\Html;

final class BulananDaftarHarga extends BaseDaftarHarga
{

    public function render(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),
            $this->renderImageMobil(),
            $this->renderNamaMobil(),
            $this->renderHarga(),
            $this->renderActionButton(),
            Html::closeTag('div'),
        ]);
    }

    protected static function getName(): string
    {
        return 'bulanan-daftar-harga-card';
    }
}
