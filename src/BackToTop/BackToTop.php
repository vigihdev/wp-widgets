<?php

declare(strict_types=1);

namespace WpWidgets\BackToTop;


use Yiisoft\Html\Html;

/**
 * BackToTop
 * Kelas untuk membuat widget tombol 'Back to Top' yang memungkinkan pengguna untuk kembali ke bagian atas halaman.
 */
final class BackToTop
{

    /**
     * BackToTop constructor.
     */
    public function __construct() {}


    /**
     * Merender tombol 'Back to Top' menjadi string HTML.
     *
     * @return string Representasi HTML dari tombol 'Back to Top'.
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
