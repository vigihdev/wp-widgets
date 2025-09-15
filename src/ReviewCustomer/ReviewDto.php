<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;


final class ReviewDto implements InterfaceReviewCustomer
{


    public function __construct(
        private readonly string $imgUri,
        private readonly string $username,
        private readonly float|int $rating,
        private readonly string $reviewText
    ) {}

    public function getProfile(): string
    {
        return $this->imgUri;
    }

    public function getReviewText(): string
    {
        return $this->reviewText;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
