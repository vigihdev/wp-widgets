<?php

declare(strict_types=1);

namespace WpWidgets\ContactInfo;

use Yiisoft\Arrays\ArrayHelper;
use Yiisoft\Html\Html;
use Yiisoft\Strings\Inflector;

/**
 * ContactInfo
 * Kelas ini digunakan untuk menampilkan informasi kontak seperti nomor telepon, alamat email, atau media sosial.
 */
final class ContactInfo
{
    /**
     * @var array $items Array yang menyimpan daftar item informasi kontak.
     */
    private array $items = [];

    /**
     * Konstruktor ContactInfo.
     *
     * @param string $baseUrlImg URL dasar untuk gambar ikon kontak.
     */
    public function __construct(
        protected readonly string $baseUrlImg
    ) {}

    /**
     * Menambahkan item informasi kontak baru ke daftar.
     *
     * @param string $filename Nama file ikon kontak.
     * @param string $content Konten informasi kontak (misal: nomor telepon, alamat email).
     * @return self Instance ContactInfo saat ini untuk chaining method.
     */
    public function add(string $filename, string $content): self
    {
        $this->items = ArrayHelper::merge($this->items, [
            ['filename' => $filename, 'content' => $content]
        ]);
        return $this;
    }

    /**
     * Merender daftar informasi kontak menjadi string HTML.
     *
     * @return string Representasi HTML dari daftar informasi kontak.
     */
    public function render(): string
    {

        $items = [];
        foreach ($this->items as $value) {

            $filename = $value['filename'];
            $class = preg_replace('/\.\w+$/', '', $filename) . ' lazyload';
            $alt = (new Inflector())->toWords(preg_replace('/\.\w+$/', '', $filename));
            $uri = $this->baseUrlImg . DIRECTORY_SEPARATOR . $value['filename'];
            $content = $value['content'];

            $item = implode('', [
                Html::img($uri, $alt, [
                    'class' => 'contact-info-icon ' . $class,
                    'title' => $alt
                ]),
                Html::span($content, ['class' => 'contact-info-text'])
            ]);

            $items[] = Html::div($item, [
                'class' => 'contact-info-group ripple-effect'
            ])->encode(false);
        }

        $item = implode('', $items);

        return
            Html::div($item, [
                'class' => 'contact-info-items'
            ])
            ->encode(false)
            ->render();
    }
}
