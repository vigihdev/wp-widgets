<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;


final class ReviewCustomer extends AbstractReviewCustomer
{


    /**
     * @var InterfaceReviewCustomer[] $items
     */
    private array $items = [];

    public function __construct(
        protected readonly string $baseUrlImg
    ) {}


    public function add(string $imgName, string $username, float $rating, string $reviewText): self
    {

        $this->items = ArrayHelper::merge($this->items, [
            new ReviewDto(
                imgUri: $this->baseUrlImg . DIRECTORY_SEPARATOR . $imgName,
                username: $username,
                rating: $rating,
                reviewText: $reviewText
            )
        ]);


        return $this;
    }

    public function render(): string
    {

        $items = [];
        foreach ($this->items as $item) {

            $cardHeader = implode('', [
                Html::openTag('div', ['class' => 'review-card-header']),

                Html::openTag('div', ['class' => 'review-group review-group-media']),
                Html::img($item->getProfile(), "Profile", [
                    'class' => 'img-media lazyload',
                    'fetchpriority' => 'high',
                    'width' => 120,
                    'height' => 120
                ]),
                Html::closeTag('div'), // review-group

                Html::openTag('div', ['class' => 'review-group review-group-content']),
                Html::div($item->getUsername(), ['class' => 'review-username']),
                Html::openTag('div', ['class' => 'review-rating']),
                Html::div($this->ratingStar((string)$item->getRating()), ['class' => 'rating-star'])->encode(false),
                Html::div('(' . (string)$item->getRating() . ')', ['class' => 'rating-point']),
                Html::closeTag('div'),
                Html::closeTag('div'), // review-group

                Html::closeTag('div'), // review-card-header

            ]);

            $cardBody = implode('', [
                Html::openTag('div', ['class' => 'review-card-body']),
                Html::div($item->getReviewText(), ['class' => 'review-text']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', ['class' => 'review-customer-card']),
                $cardHeader,
                $cardBody,
                Html::closeTag('div'),
            ]);
        }

        return implode(PHP_EOL, $items);
    }
}
