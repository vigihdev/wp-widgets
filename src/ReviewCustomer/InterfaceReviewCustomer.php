<?php

declare(strict_types=1);

namespace WpWidgets\ReviewCustomer;


interface InterfaceReviewCustomer
{

    public function getUsername(): string;
    public function getRating(): float|int;
    public function getProfile(): string;
    public function getReviewText(): string;
}
