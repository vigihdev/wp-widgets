<?php

declare(strict_types=1);

namespace WpWidgets\FormApiOrder;

use WpWidgets\TextField\RoundedTextField;
use Yiisoft\Html\Html;


final class FormApiOrder
{

    public function __construct() {}

    public function render(): string
    {


        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'container container-form-api-order']),
            Html::openTag('div', ['class' => 'row form-api-order']),

            Html::openTag('div', ['class' => 'col-md-3']),
            $this->renderPenjemputan(),
            Html::closeTag('div'),

            Html::openTag('div', ['class' => 'col-md-3']),
            $this->renderTujuan(),
            Html::closeTag('div'),

            Html::openTag('div', ['class' => 'col-md-3']),
            $this->renderTglMulai(),
            Html::closeTag('div'),

            Html::openTag('div', ['class' => 'col-md-3 col-button-action']),
            $this->renderButtonAction(),
            Html::closeTag('div'),

            Html::closeTag('div'), // row form-api-order

            Html::closeTag('div') // container
        ]);
    }


    protected function renderPenjemputan()
    {
        return (new RoundedTextField(
            name: 'penjemputan',
            options: [
                'theme' => 'warning'
            ],
            iconOptions: ['name' => 'location_on'],
            inputOptions: [
                'class' => 'form-control-address',
                'placeholder' => 'Cari Penjemputan anda di sini...'
            ],
        ))->field();
    }


    protected function renderTujuan(): string
    {
        return (new RoundedTextField(
            name: 'tujuan',
            iconOptions: ['name' => 'location_on'],
            inputOptions: [
                'class' => 'form-control-address',
                'placeholder' => 'Cari tujuan anda di sini...'
            ],
        ))->field();
    }

    protected function renderTglMulai(): string
    {
        return (new RoundedTextField(
            name: 'tgl_mulai',
            iconOptions: ['name' => 'calendar_month'],
            inputOptions: ['class' => 'form-control-date-time-picker user-select-none'],
        ))->field();
    }


    /**
     *
     * @return string
     */
    protected function renderButtonAction(): string
    {
        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'btn-action']),
            Html::button(
                implode('', [
                    Html::span('Cek Harga Sewa', ['class' => 'text-content']),
                    Html::span('east', ['class' => 'material-icons-outlined']),
                ]),
                ['class' => 'btn btn-sm btn-submit btn-primary border-r8 d-flex align-items-center']
            )
                ->encode(false)
                ->render(),
            Html::closeTag('div'),
        ]);
    }
}
