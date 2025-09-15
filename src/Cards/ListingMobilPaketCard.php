<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use WpWidgets\Cards\Contract\PaketHargaInterface;
use WpWidgets\Cards\Contract\PaketMobilInterface;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

final class ListingMobilPaketCard extends BaseCard
{

    private array $items = [];

    protected static function getName(): string
    {
        return 'listing-mobil-paket-card';
    }

    public function __construct(
        private readonly string $basePathImg
    ) {}

    /**
     *
     * @param PaketMobilInterface
     * @param PaketHargaInterface[] $paketHarga
     * @param string $url
     * @return self
     */
    public function add(PaketMobilInterface $mobil, array $paketHarga, string $url): self
    {

        $listHarga = array_map(function ($paket) {
            return $paket instanceof PaketHargaInterface ?
                $this->buildHarga($paket->getHarga(), $paket->getNamaPaket()) : null;
        }, $paketHarga);

        $imgFile = Html::img($this->getUriFile($mobil->getFilename()), "{$mobil->getNamaMobil()}", $this->getOptionsImg());
        $this->items = ArrayHelper::merge($this->items, [
            [
                implode('', [
                    Html::openTag('div', ['class' => 'listing-mobil-media']),
                    $imgFile,
                    Html::closeTag('div'),

                    Html::openTag('div', ['class' => 'list-item nama-mobil']),
                    $mobil->getNamaMobil(),
                    Html::closeTag('div'),

                    Html::openTag('div', ['class' => 'list-groups']),
                    implode('', $listHarga),
                    Html::closeTag('div'),

                    $this->buildBtnAction(),
                ]),

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

    private function buildHarga(int $harga, string $paket, array $options = []): string
    {
        return implode('', [
            Html::openTag('div', ['class' => 'list-paket-harga']),
            Html::span('Rp. ' . number_format($harga, 0, '.', '.'), ['class' => 'text-harga']),
            Html::span($paket, ['class' => 'text-paket']),
            Html::closeTag('div'),
        ]);
    }

    private function getUriFile(string $filename)
    {
        return $this->basePathImg . DIRECTORY_SEPARATOR . $filename;
    }

    private function getOptionsImg(): array
    {
        return [
            'class' => 'img-media lazyload',
            'fetchpriority' => 'high',
            'width' => 250,
            'height' => 140
        ];
    }
}
