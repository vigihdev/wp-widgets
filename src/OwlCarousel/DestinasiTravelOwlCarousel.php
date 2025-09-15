<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use Symfony\Component\Finder\Finder;
use Yiisoft\Html\Html;

final class DestinasiTravelOwlCarousel extends AbstractOwlCarousel
{

    public function __construct(
        protected readonly string $basePathImg
    ) {}


    public function render(): string
    {

        $items = [];
        $finder = new Finder();
        $finder->in($this->basePathImg)->depth(0)->name('/\.webp$/');
        $i = 0;
        foreach ($finder->files() as $file) {
            $i = $i + 1;
            $uriFile = $this->transformPathFileToUri($file->getPathname());
            $imgFile = Html::img($uriFile, "Slide {$i}", $this->getOptionsImage($file->getPathname()));

            $items[] = implode(PHP_EOL, [
                Html::openTag('div', [
                    'class' => 'item-media' . ($i > 1 ? ' reduced-motion-none' : null)
                ]),
                $imgFile,
                Html::closeTag('div'),
            ]);
        }

        return implode(PHP_EOL, [
            Html::openTag('div', [
                'class' => 'owl-carousel owl-theme destinasi-travel-owl-carousel',
                'data-options' => $this->renderOption()
            ]),
            implode('', $items),
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
                ->setItems(2)
                ->setLoop(true)
                ->setMargin(10)
                ->setAutoplay(true)
                ->setAutoplayHoverPause(true)
                ->setAutoplayTimeout(5000)
                ->setNav(true)
                ->setDots(false)
                ->setNavTextMaterialIconIos()
                ->setNavElement('button type="button" aria-label="Previous slide"')
                ->setNavContainerClass('owl-nav-destinasi-travel')
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
                        ->setItems(1)
                        ->setNav(true)
                        ->setDots(false)
                        ->jsonSerialize(),
                    992 => (new OptionsOwlCarousel())
                        ->setItems(2)
                        ->setNav(true)
                        ->setDots(false)
                        ->jsonSerialize(),
                ],
            ]
        );

        return json_encode($options);
    }
}
