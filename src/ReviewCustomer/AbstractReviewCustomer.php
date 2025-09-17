<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;

use Yiisoft\Html\Html;

/**
 * AbstractReviewCustomer
 * Kelas abstrak dasar untuk mengelola dan menampilkan review customer.
 * Menyediakan fungsionalitas umum seperti rendering bintang rating.
 *
 * @property string $imgName Nama file gambar profil customer.
 * @property string $username Nama customer.
 * @property float|string|int $rating Rating yang diberikan customer.
 * @property string $reviewText Teks review dari customer.
 */
abstract class AbstractReviewCustomer
{
    /**
     * @param string $imgName
     * @param string $username
     * @param float|string|int $rating
     * @param string $reviewText
     * @return self
     */
    abstract public function add(string $imgName, string $username, float $rating, string $reviewText): self;

    /**
     * @return string
     */
    abstract public function render(): string;

    /**
     * Mengembalikan string HTML yang merepresentasikan bintang rating berdasarkan nilai rating yang diberikan.
     *
     * @param float|string|int $rating Nilai rating (misal: 4.5).
     * @return string String HTML dari bintang rating.
     */
    protected function ratingStar(float|string|int $rating): string
    {
        $stars = implode('', [
            Html::span('star', ['class' => 'material-icons-outlined text-warning']),
            Html::span('star', ['class' => 'material-icons-outlined text-warning']),
            Html::span('star', ['class' => 'material-icons-outlined text-warning'])
        ]);

        $stars4 = implode('', [
            $stars,
            Html::span('star_half', ['class' => 'material-icons-outlined text-warning'])
        ]);

        $stars5 = implode('', [
            $stars,
            Html::span('star', ['class' => 'material-icons-outlined text-warning']),
            Html::span('star_half', ['class' => 'material-icons-outlined text-warning'])
        ]);

        return $stars5;
    }
}
