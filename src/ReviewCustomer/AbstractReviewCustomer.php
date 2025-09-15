<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;

use Yiisoft\Html\Html;


abstract class AbstractReviewCustomer
{

    abstract public function add(string $imgName, string $username, float $rating, string $reviewText): self;

    abstract public function render(): string;

    protected function ratingStar(float|string|int $rating): string
    {
        $stars = implode('', [
            Html::span('star', ['class' => 'material-icons-outlined text-warning']),
            Html::span('star', ['class' => 'material-icons-outlined text-warning']),
            Html::span('star', ['class' => 'material-icons-outlined text-warning'])
        ]);

        $stars4 = implode('', [
            $stars,
            Html::span('star_half', ['class' => 'material-icons-outlined text-warning'])
        ]);

        $stars5 = implode('', [
            $stars,
            Html::span('star', ['class' => 'material-icons-outlined text-warning']),
            Html::span('star_half', ['class' => 'material-icons-outlined text-warning'])
        ]);

        return $stars5;
    }
}
