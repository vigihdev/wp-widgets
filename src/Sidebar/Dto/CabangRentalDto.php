<?php

declare(strict_types=1);

namespace WpWidgets\Sidebar\Dto;

/**
 * Data Transfer Object untuk Cabang Rental pada Sidebar.
 *
 * @package WpWidgets\Sidebar\Dto
 *
 * @property-read string $nama Nama cabang rental
 * @property-read string $alamat Alamat cabang rental
 */
final class CabangRentalDto
{

    /**
     * Create a new CabangRentalDto instance.
     * @param string $nama Nama cabang rental
     * @param string $alamat Alamat cabang rental
     * @return self
     */
    public static function create(string $nama, string $alamat): self
    {
        return new self($nama, $alamat);
    }

    /**
     * Create a new CabangRentalDto instance.
     * @param string $nama Nama cabang rental
     * @param string $alamat Alamat cabang rental
     * @return self
     */
    public function __construct(
        private readonly string $nama,
        private readonly string $alamat
    ) {}
    
    /**
     * Getter untuk nama cabang rental.
     * @return string Nama cabang rental
     */
    public function getNama(): string
    {
        return $this->nama;
    }

    /**
     * Getter untuk alamat cabang rental.
     * @return string Alamat cabang rental
     */
    public function getAlamat(): string
    {
        return $this->alamat;
    }
}
