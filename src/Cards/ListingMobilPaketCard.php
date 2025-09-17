<?php

declare(strict_types=1);

namespace WpWidgets\Cards;

use WpWidgets\Cards\Contract\PaketHargaInterface;
use WpWidgets\Cards\Contract\PaketMobilInterface;
use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;

/**
 * ListingMobilPaketCard
 * Kelas ini memperluas `BaseCard` untuk menampilkan kartu listing mobil dengan informasi paket harga.
 * Setiap kartu menampilkan gambar mobil, nama, daftar paket harga, dan tombol aksi.
 */
final class ListingMobilPaketCard extends BaseCard
{

    /**
     * @var array $items Array yang menyimpan daftar item listing mobil dengan paket harga.
     */
    private array $items = [];

    /**
     * Mengembalikan nama unik untuk jenis kartu ini.
     *
     * @return string Nama jenis kartu.
     */
    protected static function getName(): string
    {
        return 'listing-mobil-paket-card';
    }

    /**
     * Konstruktor ListingMobilPaketCard.
     *
     * @param string $basePathImg Path dasar ke direktori yang berisi gambar mobil.
     */
    public function __construct(
        private readonly string $basePathImg
    ) {}

    /**
     * Menambahkan item listing mobil dengan paket harga ke daftar kartu.
     *
     * @param PaketMobilInterface $mobil Objek yang mengimplementasikan PaketMobilInterface.
     * @param PaketHargaInterface[] $paketHarga Array objek yang mengimplementasikan PaketHargaInterface.
     * @param string $url URL tautan ke detail mobil.
     * @return self Instance ListingMobilPaketCard saat ini untuk chaining method.
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

    /**
     * Merender daftar kartu listing mobil dengan paket harga menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar kartu listing mobil.
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
     * Membangun dan mengembalikan representasi HTML dari harga dan paket.
     *
     * @param int $harga Harga sewa mobil.
     * @param string $paket Nama paket harga.
     * @param array $options Opsi tambahan untuk elemen HTML (saat ini tidak digunakan).
     * @return string Representasi HTML dari harga dan paket.
     */
    private function buildHarga(int $harga, string $paket, array $options = []): string
    {
        return implode('', [
            Html::openTag('div', ['class' => 'list-paket-harga']),
            Html::span('Rp. ' . number_format($harga, 0, '.', '.'), ['class' => 'text-harga']),
            Html::span($paket, ['class' => 'text-paket']),
            Html::closeTag('div'),
        ]);
    }

    /**
     * Mengembalikan URI lengkap untuk file gambar berdasarkan nama file.
     *
     * @param string $filename Nama file gambar.
     * @return string URI lengkap untuk file gambar.
     */
    private function getUriFile(string $filename)
    {
        return $this->basePathImg . DIRECTORY_SEPARATOR . $filename;
    }

    /**
     * Mengembalikan opsi HTML untuk gambar listing mobil.
     *
     * @return array Array opsi HTML untuk elemen `<img>`.
     */
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
