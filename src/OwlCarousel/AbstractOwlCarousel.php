<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use Symfony\Component\Filesystem\Path;

/**
 * AbstractOwlCarousel
 * Kelas abstrak dasar untuk membuat Owl Carousel di WordPress.
 * Menyediakan fungsionalitas umum untuk rendering carousel dan manipulasi path file.
 */
abstract class AbstractOwlCarousel
{


    /**
     * Merender Owl Carousel menjadi string HTML. Harus diimplementasikan oleh kelas turunan.
     *
     * @return string Representasi HTML dari Owl Carousel.
     */
    abstract public function render(): string;

    /**
     * Mengubah path file lokal menjadi URI yang dapat diakses melalui web.
     *
     * @param string $filepath Path lengkap ke file lokal.
     * @return string URI yang dapat diakses melalui web untuk file tersebut.
     */
    protected function transformPathFileToUri(string $filepath): string
    {
        return get_template_directory_uri() . DIRECTORY_SEPARATOR .
            Path::makeRelative($filepath, get_template_directory());
    }

    /**
     * Mendapatkan opsi HTML untuk gambar berdasarkan filename.
     *
     * Mengambil dimensi gambar dari file dan mengembalikan array opsi HTML
     * yang sesuai untuk elemen `<img>`.
     *
     * @param string $filename Path lengkap ke file gambar.
     * @return array Array opsi HTML untuk gambar.
     */
    protected function getOptionsImage(string $filename): array
    {
        list($width, $height, $type, $attr) = getimagesize($filename);
        return [
            'class' => 'img-media lazyload',
            'fetchpriority' => 'high',
            'width' => $width,
            'height' => $height
        ];
    }
}
