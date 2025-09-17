<?php

declare(strict_types=1);

namespace WpWidgets\ConnectWithUs;


use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;

/**
 * ConnectWithUs
 * Kelas ini digunakan untuk menampilkan tautan 'Connect With Us' (Hubungi Kami) dengan ikon.
 * Ini mengambil gambar ikon dan URL untuk merender daftar tautan media sosial atau kontak.
 */
final class ConnectWithUs
{
    /**
     * @var array $items Array yang menyimpan daftar item 'Connect With Us'.
     */
    private array $items = [];

    /**
     * Konstruktor ConnectWithUs.
     *
     * @param string $baseUrlImg URL dasar untuk gambar ikon.
     */
    public function __construct(
        protected readonly string $baseUrlImg
    ) {}

    /**
     * Menambahkan item 'Connect With Us' baru ke daftar.
     *
     * @param string $filename Nama file gambar ikon.
     * @param string $url URL tautan.
     * @return self Instance ConnectWithUs saat ini untuk chaining method.
     */
    public function add(string $filename, string $url): self
    {
        $this->items = ArrayHelper::merge($this->items, [['filename' => $filename, 'url' => $url]]);
        return $this;
    }

    /**
     * Merender daftar item 'Connect With Us' menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar item 'Connect With Us'.
     */
    public function render(): string
    {

        $items = [];
        foreach ($this->items as $value) {

            $filename = $value['filename'];
            $class = preg_replace('/\.\w+$/', '', $filename) . ' lazyload';
            $alt = (new Inflector())->toWords(preg_replace('/\.\w+$/', '', $filename));
            $uri = $this->baseUrlImg . DIRECTORY_SEPARATOR . $value['filename'];
            $url = $value['url'];

            $items[] = Html::img($uri, $alt, [
                'class' => $class . ' ripple-effect',
                'title' => $alt
            ]);
        }

        $item = implode('', $items);

        return
            Html::div($item, [
                'class' => 'connect-with-us-items'
            ])
            ->encode(false)
            ->render();
    }
}
