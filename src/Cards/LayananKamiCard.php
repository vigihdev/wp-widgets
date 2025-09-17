<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use WpWidgets\Cards\Contract\LayananKamiInterface;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

/**
 * LayananKamiCard
 * Kelas ini memperluas `BaseCard` untuk menampilkan kartu layanan kami.
 * Setiap kartu menampilkan gambar, judul, dan deskripsi layanan.
 */
final class LayananKamiCard extends BaseCard
{
    /**
     * @var array $items Array yang menyimpan daftar item layanan kami.
     */
    private array $items = [];

    /**
     * Mengembalikan nama unik untuk jenis kartu ini.
     *
     * @return string Nama jenis kartu.
     */
    protected static function getName(): string
    {
        return 'layanan-kami-card';
    }

    /**
     * Konstruktor LayananKamiCard.
     *
     * @param string $basePathImg Path dasar ke direktori yang berisi gambar layanan.
     */
    public function __construct(
        private readonly string $basePathImg
    ) {}

    /**
     * Menambahkan item layanan baru ke daftar kartu.
     *
     * @param LayananKamiInterface $layanan Objek yang mengimplementasikan LayananKamiInterface.
     * @return self Instance LayananKamiCard saat ini untuk chaining method.
     */
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

    /**
     * Merender daftar kartu layanan kami menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar kartu layanan.
     */
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

    /**
     * Mengembalikan opsi HTML untuk gambar layanan.
     *
     * @return array Array opsi HTML untuk elemen `<img>`.
     */
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
