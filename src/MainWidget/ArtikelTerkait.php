<?php

declare(strict_types=1);

namespace WpWidgets\MainWidget;

use WpWidgets\MainWidget\Dto\ArtikelTerkaitDto;
use Yiisoft\Html\Html;

final class ArtikelTerkait extends BaseMainWidget
{

    protected static function getName(): string
    {
        return 'related-posts-widget';
    }

    public function __construct() {}


    public function render(): string
    {
        return implode('', [
            Html::openTag('div', ['class' => self::getName()]),

            Html::openTag('div', ['class' => self::getName() . '-content']),
            $this->renderCard(),
            Html::closeTag('div'),

            Html::closeTag('div'),
        ]);
    }

    private function renderCard(): string
    {

        $artikel =
            new ArtikelTerkaitDto(
                imageUrl: get_template_directory_uri() . '/images/test-mobil.png',
                title: 'Sewa Mobil Surabaya',
                snippet: 'Pernah nggak sih lagi di Surabaya, mau jalan-jalan atau ada urusan penting, terus bingung cari.....',
                url: '#'
            );

        $items = [];
        for ($i = 0; $i < 7; $i++) {

            $media = implode('', [
                Html::openTag('div', ['class' => 'related-posts-media']),
                Html::img($artikel->getImageUrl(), $artikel->getTitle(), [
                    'class' => 'img-media layzload',
                ]),
                Html::closeTag('div'),
            ]);

            $title = implode('', [
                Html::openTag('div', ['class' => 'related-posts-title']),
                Html::h3($artikel->getTitle(), ['class' => 'posts-title']),
                Html::closeTag('div'),
            ]);

            $snippet = implode('', [
                Html::openTag('div', ['class' => 'related-posts-snippet']),
                Html::h3($artikel->getSnippet(), ['class' => 'posts-snippet']),
                Html::closeTag('div'),
            ]);

            $items[] = implode('', [
                Html::openTag('div', ['class' => self::getName() . '-card']),
                $media,

                Html::openTag('div', ['class' => 'related-posts-body']),
                $title,
                $snippet,
                Html::closeTag('div'),

                Html::closeTag('div'),
            ]);
        }

        return implode('', [
            implode('', $items),
        ]);
    }
}
