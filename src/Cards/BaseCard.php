<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use Yiisoft\Html\Html;

/**
 * BaseCard
 * Kelas abstrak dasar untuk membuat berbagai jenis kartu widget.
 * Menyediakan fungsionalitas umum untuk mendapatkan nama kartu dan merender kartu.
 */
abstract class BaseCard
{
    /**
     * Mengembalikan nama unik untuk jenis kartu ini. Harus diimplementasikan oleh kelas turunan.
     *
     * @return string Nama jenis kartu.
     */
    abstract protected static function getName(): string;
    /**
     * Merender kartu menjadi string HTML. Harus diimplementasikan oleh kelas turunan.
     *
     * @return string Representasi HTML dari kartu.
     */
    abstract public function render(): string;

    /**
     * Membangun dan mengembalikan tombol aksi dalam format HTML.
     *
     * @param array $options Opsi tambahan untuk tombol aksi (saat ini tidak digunakan).
     * @return string Representasi HTML dari tombol aksi.
     */
    protected function buildBtnAction(array $options = []): string
    {
        return implode(PHP_EOL, [
            Html::openTag('div', ['class' => 'list-item btn-action']),
            Html::button('Pesan Sekarang', ['class' => 'btn btn-dark btn-block']),
            Html::closeTag('div'),
        ]);
    }
}
