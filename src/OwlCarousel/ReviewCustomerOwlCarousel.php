<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use WpWidgets\ReviewCustomer\ReviewCustomer;
use Yiisoft\Html\Html;

/**
 * ReviewCustomerOwlCarousel
 * Kelas ini memperluas `AbstractOwlCarousel` untuk membuat Owl Carousel yang menampilkan review pelanggan.
 * Ini mengintegrasikan fungsionalitas `ReviewCustomer` untuk mengelola dan merender item review.
 */
final class ReviewCustomerOwlCarousel extends AbstractOwlCarousel
{
    /**
     * @var ReviewCustomer $review Instansiasi kelas ReviewCustomer untuk mengelola data review.
     */
    private ReviewCustomer $review;

    /**
     * Konstruktor ReviewCustomerOwlCarousel.
     *
     * @param string $baseUrlImg URL dasar untuk gambar profil pelanggan.
     */
    public function __construct(
        protected readonly string $baseUrlImg
    ) {
        $this->review = new ReviewCustomer($baseUrlImg);
    }

    /**
     * Menambahkan item review pelanggan baru ke carousel.
     *
     * @param string $imgName Nama file gambar profil customer.
     * @param string $username Nama customer.
     * @param float $rating Rating yang diberikan customer (skala 1.0 - 5.0).
     * @param string $reviewText Teks review dari customer.
     * @return self Instance ReviewCustomerOwlCarousel saat ini untuk chaining method.
     */
    public function add(string $imgName, string $username, float $rating, string $reviewText)
    {
        $this->review->add($imgName, $username, $rating, $reviewText);
        return $this;
    }

    /**
     * Merender Owl Carousel review pelanggan menjadi string HTML.
     *
     * Ini menggunakan instansi `ReviewCustomer` untuk merender item review di dalam carousel.
     *
     * @return string Representasi HTML dari Owl Carousel review pelanggan.
     */
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
     * Merender opsi konfigurasi untuk Owl Carousel sebagai string JSON.
     *
     * Ini mengonfigurasi carousel dengan opsi default dan responsif untuk review pelanggan.
     *
     * @return string String JSON yang berisi opsi konfigurasi Owl Carousel.
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
