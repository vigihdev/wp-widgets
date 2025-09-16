<?php

declare(strict_types=1);

namespace WpWidgets\TextField;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

/**
 * 
 * RoundedTextField adalah kelas yang memperluas BaseTextField untuk membuat bidang teks dengan gaya membulat.
 * Kelas ini menyediakan metode untuk menghasilkan HTML untuk bidang teks dengan tema yang dapat disesuaikan.
 * 
 * Contoh penggunaan:
 * 
 * ```php
 * $roundedTextField = new RoundedTextField();
 * echo $roundedTextField->field();
 * ```
 * 
 * Properti:
 * - `theme`: Menentukan tema warna untuk bidang teks. Nilai default adalah 'warning'.
 */
final class RoundedTextField extends BaseTextField
{

    /**
     * Menghasilkan HTML untuk bidang teks dengan gaya membulat.
     *
     * Metode ini membuat elemen HTML yang mencakup label, grup input, dan tema yang dapat disesuaikan.
     * Tema default adalah 'warning', tetapi dapat diubah dengan mengatur properti `theme` dalam opsi.
     *
     * @return string HTML yang dihasilkan untuk bidang teks.
     */
    public function field(): string
    {

        $theme = ArrayHelper::remove($this->options, 'theme', 'warning');

        return implode('', [
            Html::openTag('div', ['class' => "form-group form-group-rounded form-group-rounded-{$theme} form-group-rounded-filled"]),

            $this->getLabel(),
            Html::openTag('div', ['class' => 'input-group flex-nowrap input-group-rounded input-group-icon']),
            $this->inputGroupPrepend(),
            $this->textInput(),
            Html::closeTag('div'),

            Html::closeTag('div'),
        ]);
    }
}
