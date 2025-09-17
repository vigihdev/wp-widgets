<?php

declare(strict_types=1);

namespace WpWidgets\Question;

use Yiisoft\Html\Html;

/**
 * AbstractQuestion
 * Kelas abstrak dasar untuk mengelola dan menampilkan daftar pertanyaan dan jawaban.
 * Menyediakan fungsionalitas umum untuk rendering elemen UI pertanyaan dan jawaban.
 */
abstract class AbstractQuestion
{


    /**
     * Mengembalikan nama unik untuk kelas ini. Harus diimplementasikan oleh kelas turunan.
     *
     * @return string Nama unik kelas.
     */
    abstract protected static function getName(): string;

    /**
     * Menambahkan pertanyaan dan jawaban baru ke daftar. Harus diimplementasikan oleh kelas turunan.
     *
     * @param string $question Teks pertanyaan.
     * @param array $answers Array berisi teks jawaban.
     * @return self Instance kelas saat ini untuk chaining method.
     */
    abstract public function add(string $question, array $answers): self;

    /**
     * Merender daftar pertanyaan dan jawaban menjadi string HTML. Harus diimplementasikan oleh kelas turunan.
     *
     * @return string Representasi HTML dari daftar pertanyaan dan jawaban.
     */
    abstract public function render(): string;

    /**
     * Merender ikon 'add' sebagai string HTML.
     *
     * @return string Representasi HTML dari ikon 'add'.
     */
    protected function renderIconAdd(): string
    {
        return Html::span('add', ['class' => 'material-icons-outlined'])->render();
    }

    /**
     * Merender elemen collapse untuk pertanyaan.
     *
     * @param string $target ID target elemen yang akan diciutkan.
     * @param string $parent ID parent untuk grup collapse.
     * @param string $content Teks pertanyaan yang akan ditampilkan.
     * @return string Representasi HTML dari elemen collapse pertanyaan.
     */
    protected function renderQuestionCollapse(string $target, string $parent, string $content): string
    {
        return implode('', [
            Html::openTag('div', [
                'role' => 'button',
                'data-toggle' => 'collapse',
                'data-target' => '#' . $target,
                'data-parent' => '#' . $parent,
                'aria-expanded' => 'false',
                'aria-controls' => $target,
                'aria-labelledby' => $target,
                'tabindex' => '0',
                'class' => 'collapse-group ripple-effect collapsed'
            ]),
            Html::span($content, ['class' => 'question-text']),
            Html::span('add', ['class' => 'material-icons-outlined'])->render(),
            Html::closeTag('div'),
        ]);
    }

    /**
     * Merender daftar jawaban menjadi string HTML.
     *
     * @param array $answers Array berisi teks jawaban.
     * @return string Representasi HTML dari daftar jawaban.
     */
    protected function renderAnswers(array $answers): string
    {

        $answers = array_map(function ($value, $key)  use ($answers) {
            if (count($answers) === 1) {
                return Html::div($value, ['class' => 'answer-text'])->render();
            }

            return implode('', [
                Html::openTag('div', ['class' => 'answer-group-text']),
                Html::span((string) ($key + 1), ['class' => 'answer-number']),
                Html::span($value, ['class' => 'answer-text']),
                Html::closeTag('div'),
            ]);
        }, $answers, array_keys($answers));

        return implode('', $answers);
    }
}
