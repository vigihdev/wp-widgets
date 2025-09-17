<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;

/**
 * ReviewDto
 * Data Transfer Object (DTO) untuk merepresentasikan detail review customer.
 */
final class ReviewDto implements InterfaceReviewCustomer
{


    /**
     * ReviewDto constructor.
     *
     * @param string $imgUri URI gambar profil customer.
     * @param string $username Nama customer.
     * @param float|int $rating Rating yang diberikan customer (skala 1.0 - 5.0).
     * @param string $reviewText Teks review dari customer.
     */
    public function __construct(
        private readonly string $imgUri,
        private readonly string $username,
        private readonly float|int $rating,
        private readonly string $reviewText
    ) {}

    /**
     * Mengembalikan URI gambar profil customer.
     *
     * @return string URI gambar profil.
     */
    public function getProfile(): string
    {
        return $this->imgUri;
    }

    /**
     * Mengembalikan teks review dari customer.
     *
     * @return string Teks review.
     */
    public function getReviewText(): string
    {
        return $this->reviewText;
    }

    /**
     * Mengembalikan rating yang diberikan customer.
     *
     * @return float Rating.
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * Mengembalikan nama pengguna customer.
     *
     * @return string Nama pengguna.
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}
