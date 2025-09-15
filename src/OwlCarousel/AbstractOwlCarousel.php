<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use Symfony\Component\Filesystem\Path;

abstract class AbstractOwlCarousel
{


    abstract public function render(): string;

    protected function transformPathFileToUri(string $filepath): string
    {
        return get_template_directory_uri() . DIRECTORY_SEPARATOR .
            Path::makeRelative($filepath, get_template_directory());
    }

    /**
     *
     * @param string $filename
     * @return array
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
