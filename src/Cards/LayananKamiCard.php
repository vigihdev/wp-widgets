<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use WpWidgets\Cards\Contract\LayananKamiInterface;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class LayananKamiCard extends BaseCard
{

    private array $items = [];

    protected static function getName(): string
    {
        return 'layanan-kami-card';
    }

    public function __construct(
        private readonly string $basePathImg
    ) {}

    public function add(LayananKamiInterface $layanan): self
    {
        $imgFile = Html::img(
            $this->basePathImg . DIRECTORY_SEPARATOR . $layanan->getFilename(),
            "{$layanan->getTitle()}",
            $this->getOptionsImg()
        );

        $this->items = ArrayHelper::merge($this->items, [
            [
                implode('', [
                    Html::openTag('div', ['class' => 'layanan-kami-media']),
                    $imgFile,
                    Html::closeTag('div'),

                    Html::openTag('div', ['class' => 'layanan-kami-title']),
                    $layanan->getTitle(),
                    Html::closeTag('div'),

                    Html::openTag('div', ['class' => 'layanan-kami-description']),
                    $layanan->getDescription(),
                    Html::closeTag('div'),
                ])
            ]
        ]);

        return $this;
    }

    public function render(): string
    {

        $items = [];

        foreach ($this->items as $i => $item) {
            $content = current($item) ?? null;
            if ($content) {
                $items[] = implode(PHP_EOL, [
                    Html::openTag('div', ['class' => self::getName()]),
                    $content,
                    Html::closeTag('div'),
                ]);
            }
        }

        return implode('', $items);
    }

    private function getOptionsImg(): array
    {
        return [
            'class' => 'img-media lazyload',
            'fetchpriority' => 'high',
            'width' => 330,
            'height' => 140
        ];
    }
}
