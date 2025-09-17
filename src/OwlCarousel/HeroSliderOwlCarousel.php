<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use Symfony\Component\Filesystem\Path;
use Symfony\Component\Finder\Finder;
use Yiisoft\Html\Html;

/**
 * HeroSliderOwlCarousel
 * Kelas ini digunakan untuk membuat Owl Carousel hero slider yang menampilkan gambar dari path yang diberikan.
 * Ini menyediakan fungsionalitas untuk merender slide gambar dan mengonfigurasi opsi carousel.
 */
final class HeroSliderOwlCarousel
{

    /**
     * Konstruktor HeroSliderOwlCarousel.
     *
     * @param string $basePathImg Path dasar ke direktori yang berisi gambar hero slider.
     */
    public function __construct(
        protected readonly string $basePathImg
    ) {}

    /**
     * Merender Owl Carousel hero slider menjadi string HTML.
     *
     * Ini mencari gambar `.png` di `$basePathImg` dan merendernya sebagai item carousel.
     *
     * @return string Representasi HTML dari Owl Carousel hero slider.
     */
    public function render(): string
    {

        $items = [];

        $finder = new Finder();
        $finder->in($this->basePathImg)->depth(0)->name('/\.png$/');

        foreach ($finder->files() as $i => $file) {

            $uriFile = $this->transformPathFileToUri($file->getPathname());
            list($width, $height, $type, $attr) = getimagesize($file->getPathname());
            $imgFile = Html::img($uriFile, '', [
                'class' => 'img-media lazyload',
                'fetchpriority' => 'high',
                'alt' => 'Slide ' . $i,
                'width' => $width,
                'height' => $height,
            ]);

            $items[] = implode(PHP_EOL, [
                Html::openTag('div', [
                    'class' => 'item-media' . ($i > 0 ? ' reduced-motion-none' : null)
                ]),
                $imgFile,
                Html::closeTag('div'),
            ]);
        }

        return implode(PHP_EOL, [
            Html::openTag('div', [
                'class' => 'owl-carousel owl-theme hero-slider-owl-carousel',
                'data-options' => $this->renderOption()
            ]),
            implode('', $items),
            Html::closeTag('div')
        ]);
    }

    /**
     * Mengubah path file lokal menjadi URI yang dapat diakses melalui web.
     *
     * @param string $filepath Path lengkap ke file lokal.
     * @return string URI yang dapat diakses melalui web untuk file tersebut.
     */
    private function transformPathFileToUri(string $filepath): string
    {
        return get_template_directory_uri() . DIRECTORY_SEPARATOR .
            Path::makeRelative($filepath, get_template_directory());
    }

    /**
     * Merender opsi konfigurasi untuk Owl Carousel sebagai string JSON.
     *
     * Ini mengonfigurasi carousel dengan opsi default dan responsif.
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
                ->setNavContainerClass('owl-nav-hero-slider')
                ->setDotClass('owl-dots-hero-slider')
                ->setDots(false)
                ->jsonSerialize(),
            [
                'responsive' => [
                    0 => (new OptionsOwlCarousel())
                        ->setItems(1)
                        ->setNav(true)
                        ->setDots(false)
                        ->jsonSerialize(),
                    768 => (new OptionsOwlCarousel())
                        ->setItems(1.3)
                        ->setNav(true)
                        ->setDots(false)
                        ->jsonSerialize(),
                ],
            ]
        );

        return json_encode($options);
    }
}
