<?php

declare(strict_types=1);

namespace WpWidgets\TextField;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;

abstract class BaseTextField
{


    public function __construct(
        public string $name,
        protected array $options = [],
        protected array $iconOptions = [],
        protected array $inputOptions = [],
        protected array $labelOptions = [],
        protected array $inputGroupOptions = [],
    ) {}


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

    protected function textInput(): string
    {

        $class = ArrayHelper::remove($this->inputOptions, 'class');
        $this->inputOptions = ArrayHelper::merge($this->inputOptions, [
            'class' => 'form-control' . ($class ? ' ' . $class : null)
        ]);

        return Html::textInput($this->name, null, $this->inputOptions)->render();
    }

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

    protected function icon(): string
    {
        $name = ArrayHelper::remove($this->iconOptions, 'name', 'layers');
        return Html::span($name, ArrayHelper::merge($this->iconOptions, [
            'class' => 'material-icons-outlined'
        ]))->encode(false)->render();
    }
}
