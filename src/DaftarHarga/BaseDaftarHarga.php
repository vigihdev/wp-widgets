<?php

declare(strict_types=1);

namespace WpWidgets\DaftarHarga;

use Yiisoft\Html\Html;

abstract class BaseDaftarHarga
{

    abstract public function render(): string;

    abstract protected static function getName(): string;

    public function __construct(
        protected readonly string $uriImageMobil,
        protected readonly string $nama_mobil,
        protected readonly int $harga,
        protected readonly string $uriActionButton
    ) {}


    protected function renderImageMobil(int $width = 250, int $height = 140): string
    {
        return implode('', [
            Html::openTag('div', ['class' => 'group-daftar-harga group-daftar-harga-media']),
            Html::img($this->uriImageMobil, $this->nama_mobil, [
                'width' => $width,
                'height' => $height,
                'class' => 'img-media lazyload',
                'fetchpriority' => 'high',
                'data-src' => $this->uriImageMobil,
            ]),
            Html::closeTag('div'),
        ]);
    }

    protected function renderNamaMobil(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => 'group-daftar-harga group-daftar-harga-nama-mobil']),
            Html::tag('span', $this->nama_mobil, ['class' => 'nama-mobil', 'data-nama-mobil' => $this->nama_mobil]),
            Html::closeTag('div'),
        ]);
    }

    protected function renderHarga(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => 'group-daftar-harga group-daftar-harga-harga']),
            Html::tag(
                'span',
                'Rp. ' . number_format($this->harga, 0, ',', '.'),
                ['class' => 'harga-sewa', 'data-harga' => $this->harga]
            ),
            Html::closeTag('div'),
        ]);
    }

    protected function renderActionButton(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => 'group-daftar-harga group-daftar-btn-action']),
            Html::button(
                'Pesan Sekarang',
                [
                    'class' => 'btn btn-dark btn-block btn-action btn-pesan-sekarang',
                    'data-harga' => $this->harga,
                    'data-nama-mobil' => $this->nama_mobil,
                    'data-uri-action-button' => $this->uriActionButton,
                    'onclick' => "window.location.href='{$this->uriActionButton}'",
                ]
            ),
            Html::closeTag('div'),
        ]);
    }
}
