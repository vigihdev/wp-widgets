<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use Symfony\Component\Finder\Finder;
use Yiisoft\Html\Html;


final class ClientKamiOwlCarousel extends AbstractOwlCarousel
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
            $imgFile = Html::img($uriFile, "Slide {$i}", [
                'class' => 'img-media lazyload',
                'fetchpriority' => 'high',
                'width' => 150,
                'height' => 110
            ]);

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
                'class' => 'owl-carousel owl-theme client-kami-owl-carousel',
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
                ->setItems(5)
                ->setLoop(true)
                ->setMargin(10)
                ->setAutoplay(true)
                ->setAutoplayHoverPause(true)
                ->setAutoplayTimeout(5000)
                ->setNav(true)
                ->setDots(true)
                ->setNavTextMaterialIconIos()
                ->setNavElement('button type="button" aria-label="Previous slide"')
                ->setNavContainerClass('owl-nav-client-kami')
                ->setDotsClass('owl-dots-client-kami')
                ->jsonSerialize(),
            [
                'responsive' => [
                    0 => (new OptionsOwlCarousel())
                        ->setItems(2)
                        ->setDots(true)
                        ->setNav(false)
                        ->jsonSerialize(),
                    576 => (new OptionsOwlCarousel())
                        ->setItems(3)
                        ->setDots(true)
                        ->setNav(true)
                        ->jsonSerialize(),
                    768 => (new OptionsOwlCarousel())
                        ->setItems(5)
                        ->setNav(true)
                        ->setDots(true)
                        ->jsonSerialize(),
                ],
            ]
        );

        return json_encode($options);
    }
}
