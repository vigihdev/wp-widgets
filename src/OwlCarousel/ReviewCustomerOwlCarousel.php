<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use WpWidgets\ReviewCustomer\ReviewCustomer;
use Yiisoft\Html\Html;

final class ReviewCustomerOwlCarousel extends AbstractOwlCarousel
{

    private ReviewCustomer $review;

    public function __construct(
        protected readonly string $baseUrlImg
    ) {
        $this->review = new ReviewCustomer($baseUrlImg);
    }

    public function add(string $imgName, string $username, float $rating, string $reviewText)
    {
        $this->review->add($imgName, $username, $rating, $reviewText);
        return $this;
    }

    public function render(): string
    {

        return implode(PHP_EOL, [
            Html::openTag('div', [
                'class' => 'owl-carousel owl-theme review-customer-owl-carousel',
                'data-options' => $this->renderOption()
            ]),
            $this->review->render(),
            Html::closeTag('div')
        ]);
    }

    /**
     *
     * @return string
     */
    protected function renderOption(): string
    {

        $options = array_merge(
            (new OptionsOwlCarousel())
                ->setItems(5)
                ->setLoop(true)
                ->setMargin(10)
                ->setAutoplay(true)
                ->setAutoplayHoverPause(true)
                ->setAutoplayTimeout(5000)
                ->setNav(true)
                ->setDots(false)
                ->setNavTextMaterialIconIos()
                ->setNavElement('button type="button" aria-label="Previous slide"')
                ->setNavContainerClass('owl-nav-review-customer')
                ->setDotClass('owl-dots-review-customer')
                ->setDots(false)
                ->jsonSerialize(),
            [
                'responsive' => [
                    0 => (new OptionsOwlCarousel())
                        ->setItems(1)
                        ->setNav(true)
                        ->setDots(false)
                        ->jsonSerialize(),
                    600 => (new OptionsOwlCarousel())
                        ->setItems(2.5)
                        ->setNav(true)
                        ->setDots(false)
                        ->jsonSerialize(),
                ],
            ]
        );

        return json_encode($options);
    }
}
