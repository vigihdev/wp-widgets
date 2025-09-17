<?php

declare(strict_types=1);

namespace WpWidgets\Question;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

/**
 * SewaMobilQuestion
 * Kelas ini memperluas `AbstractQuestion` untuk menampilkan daftar pertanyaan dan jawaban terkait sewa mobil.
 */
final class SewaMobilQuestion extends AbstractQuestion
{

    /**
     * @var array $items Array yang menyimpan daftar pertanyaan dan jawaban.
     */
    protected array $items = [];

    /**
     * Konstruktor default untuk kelas SewaMobilQuestion.
     */
    public function __construct() {}

    /**
     * Mengembalikan nama unik untuk kelas ini.
     *
     * @return string Nama kelas.
     */
    protected static function getName(): string
    {
        return 'sewa-mobil-question';
    }

    /**
     * Menambahkan pertanyaan dan jawaban baru ke daftar.
     *
     * @param string $question Teks pertanyaan.
     * @param array $answers Array berisi teks jawaban.
     * @return self Instance SewaMobilQuestion saat ini untuk chaining method.
     */
    public function add(string $question, array $answers): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            ['question' => $question, 'answers' => $answers]
        ]);

        return $this;
    }

    /**
     * Merender daftar pertanyaan dan jawaban menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar pertanyaan dan jawaban.
     */
    public function render(): string
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            $question = array_shift($item);

            $items[] = implode('', [
                Html::openTag('div', ['class' => 'question-card']),
                $this->renderQuestionCollapse("question-{$i}", self::getName(), $question),

                Html::openTag('div', [
                    'id' => "question-{$i}",
                    'class' => 'answer-group collapse',
                    'data-parent' => '#' . self::getName()
                ]),
                $this->renderAnswers($item['answers']),
                Html::closeTag('div'),

                Html::closeTag('div'),
            ]);
        }

        return implode('', [
            Html::openTag('div', ['id' => self::getName()]),
            implode('', $items),
            Html::closeTag('div')
        ]);
    }
}
