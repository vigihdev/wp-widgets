<?php

declare(strict_types=1);

namespace WpWidgets\TextField;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;

/**
 * Kelas abstrak `BaseTextField` menyediakan dasar untuk membuat bidang teks dengan berbagai opsi konfigurasi.
 *
 * Kelas ini memungkinkan pengaturan nama, opsi elemen HTML, ikon, label, dan grup input.
 * Kelas ini dirancang untuk diperluas oleh kelas lain yang membutuhkan fungsionalitas bidang teks.
 *
 * @package WpWidgets\TextField
 */
abstract class BaseTextField
{


    /**
     * Konstruktor BaseTextField.
     *
     * @param string $name Nama bidang teks.
     * @param array $options Opsi HTML untuk elemen utama bidang teks.
     * @param array $iconOptions Opsi HTML untuk ikon.
     * @param array $inputOptions Opsi HTML untuk elemen input.
     * @param array $labelOptions Opsi HTML untuk label.
     * @param array $inputGroupOptions Opsi HTML untuk grup input.
     */
    public function __construct(
        public string $name,
        protected array $options = [],
        protected array $iconOptions = [],
        protected array $inputOptions = [],
        protected array $labelOptions = [],
        protected array $inputGroupOptions = [],
    ) {}

    /**
     * Menghasilkan HTML untuk label bidang teks.
     *
     * Metode ini membuat elemen label HTML berdasarkan nama bidang teks
     * dan opsi label yang ditentukan. Ini juga menambahkan indikator
     * 'wajib' jika diatur.
     *
     * @return string HTML yang dihasilkan untuk label.
     */
    protected function getLabel(): string
    {

        $required = ArrayHelper::remove($this->labelOptions, 'required');
        $title = (new Inflector())->toSentence($this->name, true);

        return implode('', [
            Html::openTag('label', [
                'class' => 'control-label',
                'for' => $this->name
            ]),

            Html::span($title, ['class' => 'label-text']),
            Html::span('*', ['class' => 'label-required']),
            Html::closeTag('label'),
        ]);
    }

    /**
     * Menghasilkan HTML untuk input teks.
     *
     * Metode ini membuat elemen input teks dengan atribut dan kelas yang ditentukan
     * dalam properti `inputOptions`. Kelas default 'form-control' ditambahkan ke
     * kelas yang sudah ada dalam opsi input.
     *
     * @return string HTML yang dihasilkan untuk input teks.
     */
    protected function textInput(): string
    {

        $class = ArrayHelper::remove($this->inputOptions, 'class');
        $this->inputOptions = ArrayHelper::merge($this->inputOptions, [
            'class' => 'form-control' . ($class ? ' ' . $class : null)
        ]);

        return Html::textInput($this->name, null, $this->inputOptions)->render();
    }

    /**
     * Menghasilkan HTML untuk pembungkus label bidang teks.
     *
     * Metode ini membuat struktur HTML yang mencakup elemen pembungkus label
     * dan elemen dekoratif seperti outline kiri, tengah, dan kanan.
     *
     * @return string HTML yang dihasilkan untuk pembungkus label.
     */
    protected function getLabelWrapper(): string
    {

        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'textfield-label-wrapper']),
            Html::div('', ['class' => 'textfield-outline-left']),
            Html::openTag('div', ['class' => 'textfield-outline-middle']),
            $this->getLabel(),
            Html::closeTag('div'),
            Html::div('', ['class' => 'textfield-outline-right']),
            Html::closeTag('div'),
        ]);
    }


    /**
     * Menghasilkan HTML untuk elemen input group prepend.
     *
     * Metode ini membuat struktur HTML yang mencakup elemen pembungkus
     * untuk ikon yang ditempatkan di depan input teks.
     *
     * @return string HTML yang dihasilkan untuk input group prepend.
     */
    protected function inputGroupPrepend(): string
    {

        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'input-group-prepend']),
            Html::openTag('div', ['class' => 'input-group-text']),
            $this->icon(),
            Html::closeTag('div'),
            Html::closeTag('div')
        ]);
    }

    /**
     * 
     * Menghasilkan HTML untuk elemen input group append.
     * 
     * @return string HTML yang dihasilkan untuk input group append.
     */
    protected function inputGroupAppend(): string
    {

        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'input-group-append']),
            Html::openTag('div', ['class' => 'input-group-text']),
            $this->icon(),
            Html::closeTag('div'),
            Html::closeTag('div')
        ]);
    }

    /**
     * Menghasilkan HTML untuk ikon yang digunakan dalam bidang teks.
     *
     * Metode ini mengambil nama ikon dari properti `iconOptions` dan membuat
     * elemen HTML untuk ikon tersebut dengan kelas yang sesuai.
     *
     * @return string HTML yang dihasilkan untuk ikon.
     */
    protected function icon(): string
    {
        $name = ArrayHelper::remove($this->iconOptions, 'name', 'layers');
        return Html::span($name, ArrayHelper::merge($this->iconOptions, [
            'class' => 'material-icons-outlined'
        ]))->encode(false)->render();
    }
}
