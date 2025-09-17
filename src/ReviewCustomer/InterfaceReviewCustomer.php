<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;

/**
 * Interface ReviewCustomer
 * Antarmuka untuk merepresentasikan data review customer.
 *
 * @property string $username Nama pengguna yang memberikan review.
 * @property float|int $rating Rating yang diberikan (misal: 4.5).
 * @property string $profile URL gambar profil pengguna.
 * @property string $reviewText Teks review dari pengguna.
 */
interface InterfaceReviewCustomer
{
    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @return float|int
     */
    public function getRating(): float|int;

    /**
     * @return string
     */
    public function getProfile(): string;

    /**
     * @return string
     */
    public function getReviewText(): string;
}
