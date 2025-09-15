<?php

declare(strict_types=1);

namespace WpWidgets\Question;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class SewaMobilQuestion extends AbstractQuestion
{

    protected array $items = [];

    protected static function getName(): string
    {
        return 'sewa-mobil-question';
    }

    public function add(string $question, array $answers): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            ['question' => $question, 'answers' => $answers]
        ]);

        return $this;
    }

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
