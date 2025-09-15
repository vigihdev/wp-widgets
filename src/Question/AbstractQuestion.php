<?php

declare(strict_types=1);

namespace WpWidgets\Question;

use Yiisoft\Html\Html;

abstract class AbstractQuestion
{


    abstract protected static function getName(): string;

    abstract public function add(string $question, array $answers): self;

    abstract public function render(): string;

    protected function renderIconAdd(): string
    {
        return Html::span('add', ['class' => 'material-icons-outlined'])->render();
    }

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
