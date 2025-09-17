<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use JsonSerializable;
use InvalidArgumentException;

/**
 * OptionsOwlCarousel
 * Kelas ini berfungsi sebagai Data Transfer Object (DTO) untuk mengonfigurasi opsi Owl Carousel.
 * Ini menyediakan setter untuk setiap opsi Owl Carousel dan mengimplementasikan `JsonSerializable`
 * agar dapat dengan mudah dikonversi menjadi format JSON untuk konfigurasi JavaScript.
 */
class OptionsOwlCarousel implements JsonSerializable
{
    // OPTIONS
    /**
     * @var float|null $items Jumlah item yang terlihat di carousel.
     */
    public $items;
    /**
     * @var int|null $margin Jarak antar item di carousel.
     */
    public $margin;
    /**
     * @var bool|null $loop Mengaktifkan atau menonaktifkan loop carousel tak terbatas.
     */
    public $loop;
    /**
     * @var bool|null $center Memusatkan item aktif.
     */
    public $center;
    /**
     * @var bool|null $mouseDrag Mengaktifkan atau menonaktifkan navigasi drag dengan mouse.
     */
    public $mouseDrag;
    /**
     * @var bool|null $touchDrag Mengaktifkan atau menonaktifkan navigasi drag dengan sentuhan.
     */
    public $touchDrag;
    /**
     * @var bool|null $pullDrag Mengaktifkan atau menonaktifkan efek 'pull' saat drag.
     */
    public $pullDrag;
    /**
     * @var bool|null $freeDrag Mengaktifkan atau menonaktifkan drag bebas.
     */
    public $freeDrag;
    /**
     * @var int|null $stagePadding Padding sisi stage carousel.
     */
    public $stagePadding;
    /**
     * @var bool|null $merge Mengaktifkan atau menonaktifkan penggabungan item.
     */
    public $merge;
    /**
     * @var bool|null $mergeFit Menyesuaikan item yang digabungkan agar pas.
     */
    public $mergeFit;
    /**
     * @var bool|null $autoWidth Mengaktifkan atau menonaktifkan lebar otomatis untuk item.
     */
    public $autoWidth;
    /**
     * @var int|string|null $startPosition Posisi awal carousel (indeks atau hash).
     */
    public $startPosition;
    /**
     * @var bool|null $URLhashListener Mengaktifkan atau menonaktifkan URL hash listener.
     */
    public $URLhashListener;
    /**
     * @var bool|null $nav Mengaktifkan atau menonaktifkan navigasi (panah).
     */
    public $nav;
    /**
     * @var bool|null $rewind Mengaktifkan atau menonaktifkan rewind (kembali ke awal setelah slide terakhir).
     */
    public $rewind;
    /**
     * @var string[]|null $navText Teks untuk tombol navigasi (panah).
     */
    public $navText;
    /**
     * @var string|null $navElement Elemen HTML untuk navigasi (misal: 'button').
     */
    public $navElement;
    /**
     * @var int|string|null $slideBy Jumlah item untuk meluncurkan setiap kali.
     */
    public $slideBy;
    /**
     * @var bool|null $dots Mengaktifkan atau menonaktifkan dots navigasi.
     */
    public $dots;
    /**
     * @var int|bool|null $dotsEach Mengatur berapa banyak dot yang akan ditampilkan.
     */
    public $dotsEach;
    /**
     * @var bool|null $dotsData Mengaktifkan atau menonaktifkan penggunaan data dari item untuk dot.
     */
    public $dotsData;
    /**
     * @var bool|null $lazyLoad Mengaktifkan atau menonaktifkan lazy loading gambar.
     */
    public $lazyLoad;
    /**
     * @var int|null $lazyLoadEager Jumlah item di kedua sisi yang akan dimuat terlebih dahulu saat lazy loading.
     */
    public $lazyLoadEager;
    /**
     * @var bool|null $autoplay Mengaktifkan atau menonaktifkan autoplay carousel.
     */
    public $autoplay;
    /**
     * @var int|null $autoplayTimeout Waktu tunda autoplay dalam milidetik.
     */
    public $autoplayTimeout;
    /**
     * @var bool|null $autoplayHoverPause Menghentikan autoplay saat hover.
     */
    public $autoplayHoverPause;
    /**
     * @var int|bool|null $smartSpeed Kecepatan animasi slide pintar dalam milidetik.
     */
    public $smartSpeed;
    /**
     * @var int|bool|null $fluidSpeed Kecepatan animasi slide fluida dalam milidetik.
     */
    public $fluidSpeed;
    /**
     * @var int|bool|null $autoplaySpeed Kecepatan animasi autoplay dalam milidetik.
     */
    public $autoplaySpeed;
    /**
     * @var int|bool|null $navSpeed Kecepatan animasi navigasi dalam milidetik.
     */
    public $navSpeed;
    /**
     * @var int|bool|null $dotsSpeed Kecepatan animasi dots dalam milidetik.
     */
    public $dotsSpeed;
    /**
     * @var int|bool|null $dragEndSpeed Kecepatan animasi setelah drag berakhir dalam milidetik.
     */
    public $dragEndSpeed;
    /**
     * @var bool|null $callbacks Mengaktifkan atau menonaktifkan fungsi callback.
     */
    public $callbacks;
    /**
     * @var array<string, Options>|null $responsive Konfigurasi responsif berdasarkan breakpoint.
     */
    public $responsive;
    /**
     * @var int|null $responsiveRefreshRate Frekuensi refresh responsif dalam milidetik.
     */
    public $responsiveRefreshRate;
    /**
     * @var string|null $responsiveBaseElement Elemen dasar untuk perhitungan responsif.
     */
    public $responsiveBaseElement;
    /**
     * @var bool|null $video Mengaktifkan atau menonaktifkan video dalam carousel.
     */
    public $video;
    /**
     * @var int|bool|null $videoHeight Tinggi video dalam piksel atau false untuk otomatis.
     */
    public $videoHeight;
    /**
     * @var int|bool|null $videoWidth Lebar video dalam piksel atau false untuk otomatis.
     */
    public $videoWidth;
    /**
     * @var string|bool|null $animateOut Efek animasi keluar (misal: 'fadeOut').
     */
    public $animateOut;
    /**
     * @var string|bool|null $animateIn Efek animasi masuk (misal: 'fadeIn').
     */
    public $animateIn;
    /**
     * @var string|null $fallbackEasing Fungsi easing fallback.
     */
    public $fallbackEasing;
    /**
     * @var callable|null $info Fungsi callback untuk informasi carousel.
     */
    public $info;
    /**
     * @var string|null $nestedItemSelector Selector untuk item bersarang.
     */
    public $nestedItemSelector;
    /**
     * @var string|null $itemElement Elemen HTML untuk item carousel.
     */
    public $itemElement;
    /**
     * @var string|null $stageElement Elemen HTML untuk stage carousel.
     */
    public $stageElement;
    /**
     * @var string|bool|null $navContainer Selector kontainer untuk navigasi (panah).
     */
    public $navContainer;
    /**
     * @var string|bool|null $dotsContainer Selector kontainer untuk dots.
     */
    public $dotsContainer;
    /**
     * @var bool|null $checkVisible Memeriksa visibilitas item.
     */
    public $checkVisible;
    /**
     * @var string|null $slideTransition Transisi slide (misal: 'linear').
     */
    public $slideTransition;
    /**
     * @var bool|null $autoHeight Mengaktifkan atau menonaktifkan tinggi otomatis.
     */
    public $autoHeight;
    /**
     * @var bool|null $rtl Mengaktifkan atau menonaktifkan mode Right-To-Left (RTL).
     */
    public $rtl;

    // CLASSES
    /**
     * @var string|null $refreshClass Kelas CSS untuk status refresh.
     */
    public $refreshClass;
    /**
     * @var string|null $loadingClass Kelas CSS untuk status loading.
     */
    public $loadingClass;
    /**
     * @var string|null $loadedClass Kelas CSS untuk status loaded.
     */
    public $loadedClass;
    /**
     * @var string|null $rtlClass Kelas CSS untuk mode RTL.
     */
    public $rtlClass;
    /**
     * @var string|null $dragClass Kelas CSS untuk state drag.
     */
    public $dragClass;
    /**
     * @var string|null $grabClass Kelas CSS untuk state grab.
     */
    public $grabClass;
    /**
     * @var string|null $stageClass Kelas CSS untuk stage carousel.
     */
    public $stageClass;
    /**
     * @var string|null $stageOuterClass Kelas CSS untuk stage luar carousel.
     */
    public $stageOuterClass;
    /**
     * @var string|null $navContainerClass Kelas CSS untuk kontainer navigasi.
     */
    public $navContainerClass;
    /**
     * @var string[]|null $navClass Kelas CSS untuk tombol navigasi.
     */
    public $navClass;
    /**
     * @var string|null $controlsClass Kelas CSS untuk kontrol carousel.
     */
    public $controlsClass;
    /**
     * @var string|null $dotClass Kelas CSS untuk dot navigasi.
     */
    public $dotClass;
    /**
     * @var string|null $dotsClass Kelas CSS untuk kontainer dots navigasi.
     */
    public $dotsClass;
    /**
     * @var string|null $autoHeightClass Kelas CSS untuk tinggi otomatis.
     */
    public $autoHeightClass;
    /**
     * @var string|bool|null $responsiveClass Kelas CSS untuk responsif.
     */
    public $responsiveClass;


    /**
     * Konstruktor OptionsOwlCarousel.
     *
     * Menginisialisasi opsi carousel dengan array data yang diberikan.
     * Jika sebuah setter untuk properti ada, setter tersebut akan digunakan; jika tidak,
     * properti akan diatur secara langsung.
     *
     * @param array $data Array asosiatif berisi nama opsi dan nilainya.
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $name => $value) {
            $setter = 'set' . ucfirst($name);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            } elseif (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }

    /**
     * Mengatur jumlah item yang terlihat di carousel.
     *
     * @param float $items Jumlah item yang harus ditampilkan di stage.
     * @return self Instance OptionsOwlCarousel saat ini untuk chaining method.
     * @throws InvalidArgumentException Jika jumlah item kurang dari 1.
     */
    public function setItems(float $items): self
    {
        if ($items < 1) {
            throw new InvalidArgumentException('Items must be at least 1');
        }
        $this->items = $items;
        return $this;
    }

    /**
     * Mengatur jarak antar item di carousel.
     *
     * @param int $margin Jarak dalam piksel.
     * @return self Instance OptionsOwlCarousel saat ini.
     * @throws InvalidArgumentException Jika margin negatif.
     */
    public function setMargin(int $margin): self
    {
        if ($margin < 0) {
            throw new InvalidArgumentException('Margin cannot be negative');
        }
        $this->margin = $margin;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan loop carousel tak terbatas.
     *
     * @param bool $loop True untuk mengaktifkan loop, false untuk menonaktifkan.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setLoop(bool $loop): self
    {
        $this->loop = $loop;
        return $this;
    }

    /**
     * Memusatkan item aktif di carousel.
     *
     * @param bool $center True untuk memusatkan item, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setCenter(bool $center): self
    {
        $this->center = $center;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan navigasi drag dengan mouse.
     *
     * @param bool $mouseDrag True untuk mengaktifkan drag mouse, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setMouseDrag(bool $mouseDrag): self
    {
        $this->mouseDrag = $mouseDrag;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan navigasi drag dengan sentuhan.
     *
     * @param bool $touchDrag True untuk mengaktifkan drag sentuhan, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setTouchDrag(bool $touchDrag): self
    {
        $this->touchDrag = $touchDrag;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan efek 'pull' saat drag.
     *
     * @param bool $pullDrag True untuk mengaktifkan efek pull, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setPullDrag(bool $pullDrag): self
    {
        $this->pullDrag = $pullDrag;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan drag bebas di carousel.
     *
     * @param bool $freeDrag True untuk mengaktifkan drag bebas, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setFreeDrag(bool $freeDrag): self
    {
        $this->freeDrag = $freeDrag;
        return $this;
    }

    /**
     * Mengatur padding sisi stage carousel.
     *
     * @param int $stagePadding Padding dalam piksel.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setStagePadding(int $stagePadding): self
    {
        $this->stagePadding = $stagePadding;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan penggabungan item.
     *
     * @param bool $merge True untuk mengaktifkan penggabungan, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setMerge(bool $merge): self
    {
        $this->merge = $merge;
        return $this;
    }

    /**
     * Menyesuaikan item yang digabungkan agar pas.
     *
     * @param bool $mergeFit True untuk menyesuaikan item agar pas, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setMergeFit(bool $mergeFit): self
    {
        $this->mergeFit = $mergeFit;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan lebar otomatis untuk item carousel.
     *
     * @param bool $autoWidth True untuk mengaktifkan lebar otomatis, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAutoWidth(bool $autoWidth): self
    {
        $this->autoWidth = $autoWidth;
        return $this;
    }

    /**
     * Mengatur posisi awal carousel (indeks atau hash).
     *
     * @param int|string $startPosition Indeks item awal atau hash URL.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setStartPosition($startPosition): self
    {
        $this->startPosition = $startPosition;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan URL hash listener.
     *
     * @param bool $URLhashListener True untuk mengaktifkan hash listener, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setURLhashListener(bool $URLhashListener): self
    {
        $this->URLhashListener = $URLhashListener;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan navigasi (panah) carousel.
     *
     * @param bool $nav True untuk mengaktifkan navigasi, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNav(bool $nav): self
    {
        $this->nav = $nav;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan rewind (kembali ke awal setelah slide terakhir).
     *
     * @param bool $rewind True untuk mengaktifkan rewind, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setRewind(bool $rewind): self
    {
        $this->rewind = $rewind;
        return $this;
    }

    /**
     * Mengatur teks untuk tombol navigasi (panah).
     *
     * @param string[] $navText Array string yang berisi teks untuk tombol 'prev' dan 'next'.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavText(array $navText): self
    {
        $this->navText = $navText;
        return $this;
    }

    /**
     * Mengatur teks navigasi menggunakan ikon Material Design (iOS style).
     *
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavTextMaterialIconIos(): self
    {
        $this->navText = [
            '<span class="material-icons-outlined ripple-effect" aria-hidden="true">arrow_back_ios</span>',
            '<span class="material-icons-outlined ripple-effect" aria-hidden="true">arrow_forward_ios</span>'
        ];
        return $this;
    }

    /**
     * Mengatur elemen HTML yang akan digunakan untuk navigasi (misal: 'button').
     *
     * @param string $navElement Nama elemen HTML.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavElement(string $navElement): self
    {
        $this->navElement = $navElement;
        return $this;
    }

    /**
     * Mengatur jumlah item yang akan dilewati saat meluncur (slide).
     *
     * @param int|string $slideBy Jumlah item atau 'page' untuk meluncur per halaman.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setSlideBy($slideBy): self
    {
        $this->slideBy = $slideBy;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan dots navigasi carousel.
     *
     * @param bool $dots True untuk mengaktifkan dots, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDots(bool $dots): self
    {
        $this->dots = $dots;
        return $this;
    }

    /**
     * Mengatur berapa banyak dot yang akan ditampilkan di navigasi dots.
     *
     * @param int|bool $dotsEach Jumlah dot yang akan ditampilkan atau false untuk semua.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDotsEach($dotsEach): self
    {
        $this->dotsEach = $dotsEach;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan penggunaan data dari item untuk dot navigasi.
     *
     * @param bool $dotsData True untuk mengaktifkan data dots, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDotsData(bool $dotsData): self
    {
        $this->dotsData = $dotsData;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan lazy loading gambar di carousel.
     *
     * @param bool $lazyLoad True untuk mengaktifkan lazy loading, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setLazyLoad(bool $lazyLoad): self
    {
        $this->lazyLoad = $lazyLoad;
        return $this;
    }

    /**
     * Mengatur jumlah item di kedua sisi yang akan dimuat terlebih dahulu saat lazy loading.
     *
     * @param int $lazyLoadEager Jumlah item untuk dimuat terlebih dahulu.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setLazyLoadEager(int $lazyLoadEager): self
    {
        $this->lazyLoadEager = $lazyLoadEager;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan autoplay carousel.
     *
     * @param bool $autoplay True untuk mengaktifkan autoplay, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAutoplay(bool $autoplay): self
    {
        $this->autoplay = $autoplay;
        return $this;
    }

    /**
     * Mengatur waktu tunda autoplay carousel dalam milidetik.
     *
     * @param int $autoplayTimeout Waktu tunda dalam milidetik.
     * @return self Instance OptionsOwlCarousel saat ini.
     * @throws InvalidArgumentException Jika waktu tunda autoplay negatif.
     */
    public function setAutoplayTimeout(int $autoplayTimeout): self
    {
        if ($autoplayTimeout < 0) {
            throw new InvalidArgumentException('Autoplay timeout cannot be negative');
        }
        $this->autoplayTimeout = $autoplayTimeout;
        return $this;
    }

    /**
     * Menghentikan autoplay carousel saat kursor mouse hover di atasnya.
     *
     * @param bool $autoplayHoverPause True untuk menghentikan autoplay saat hover, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAutoplayHoverPause(bool $autoplayHoverPause): self
    {
        $this->autoplayHoverPause = $autoplayHoverPause;
        return $this;
    }

    /**
     * Mengatur kecepatan animasi slide pintar dalam milidetik.
     *
     * @param int|bool $smartSpeed Kecepatan animasi atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setSmartSpeed($smartSpeed): self
    {
        $this->smartSpeed = $smartSpeed;
        return $this;
    }

    /**
     * Mengatur kecepatan animasi slide fluida dalam milidetik.
     *
     * @param int|bool $fluidSpeed Kecepatan animasi atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setFluidSpeed($fluidSpeed): self
    {
        $this->fluidSpeed = $fluidSpeed;
        return $this;
    }

    /**
     * Mengatur kecepatan animasi autoplay dalam milidetik.
     *
     * @param int|bool $autoplaySpeed Kecepatan animasi atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAutoplaySpeed($autoplaySpeed): self
    {
        $this->autoplaySpeed = $autoplaySpeed;
        return $this;
    }

    /**
     * Mengatur kecepatan animasi navigasi (panah) dalam milidetik.
     *
     * @param int|bool $navSpeed Kecepatan animasi atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavSpeed($navSpeed): self
    {
        $this->navSpeed = $navSpeed;
        return $this;
    }

    /**
     * Mengatur kecepatan animasi dots navigasi dalam milidetik.
     *
     * @param int|bool $dotsSpeed Kecepatan animasi atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDotsSpeed($dotsSpeed): self
    {
        $this->dotsSpeed = $dotsSpeed;
        return $this;
    }

    /**
     * Mengatur kecepatan animasi setelah drag berakhir dalam milidetik.
     *
     * @param int|bool $dragEndSpeed Kecepatan animasi atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDragEndSpeed($dragEndSpeed): self
    {
        $this->dragEndSpeed = $dragEndSpeed;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan fungsi callback carousel.
     *
     * @param bool $callbacks True untuk mengaktifkan callback, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setCallbacks(bool $callbacks): self
    {
        $this->callbacks = $callbacks;
        return $this;
    }

    /**
     * Mengatur konfigurasi responsif carousel berdasarkan breakpoint.
     *
     * @param array<string, OptionsOwlCarousel> $responsive Array asosiatif breakpoint dan opsi yang sesuai.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setResponsive(array $responsive): self
    {
        $this->responsive = $responsive;
        return $this;
    }

    /**
     * Mengatur frekuensi refresh responsif dalam milidetik.
     *
     * @param int $responsiveRefreshRate Frekuensi refresh dalam milidetik.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setResponsiveRefreshRate(int $responsiveRefreshRate): self
    {
        $this->responsiveRefreshRate = $responsiveRefreshRate;
        return $this;
    }

    /**
     * Mengatur elemen dasar untuk perhitungan responsif.
     *
     * @param string $responsiveBaseElement Selector elemen dasar.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setResponsiveBaseElement(string $responsiveBaseElement): self
    {
        $this->responsiveBaseElement = $responsiveBaseElement;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan video dalam carousel.
     *
     * @param bool $video True untuk mengaktifkan video, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setVideo(bool $video): self
    {
        $this->video = $video;
        return $this;
    }

    /**
     * Mengatur tinggi video dalam piksel atau otomatis.
     *
     * @param int|bool $videoHeight Tinggi video dalam piksel atau false untuk otomatis.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setVideoHeight($videoHeight): self
    {
        $this->videoHeight = $videoHeight;
        return $this;
    }

    /**
     * Mengatur lebar video dalam piksel atau otomatis.
     *
     * @param int|bool $videoWidth Lebar video dalam piksel atau false untuk otomatis.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setVideoWidth($videoWidth): self
    {
        $this->videoWidth = $videoWidth;
        return $this;
    }

    /**
     * Mengatur efek animasi keluar untuk slide.
     *
     * @param string|bool $animateOut Nama kelas animasi CSS atau false untuk tidak ada animasi.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAnimateOut($animateOut): self
    {
        $this->animateOut = $animateOut;
        return $this;
    }

    /**
     * Mengatur efek animasi masuk untuk slide.
     *
     * @param string|bool $animateIn Nama kelas animasi CSS atau false untuk tidak ada animasi.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAnimateIn($animateIn): self
    {
        $this->animateIn = $animateIn;
        return $this;
    }

    /**
     * Mengatur fungsi easing fallback untuk animasi.
     *
     * @param string $fallbackEasing Nama fungsi easing.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setFallbackEasing(string $fallbackEasing): self
    {
        $this->fallbackEasing = $fallbackEasing;
        return $this;
    }

    /**
     * Mengatur fungsi callback untuk informasi carousel.
     *
     * @param callable $info Fungsi callback yang akan dipanggil.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setInfo(callable $info): self
    {
        $this->info = $info;
        return $this;
    }

    /**
     * Mengatur selector untuk item bersarang dalam carousel.
     *
     * @param string $nestedItemSelector Selector CSS untuk item bersarang.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNestedItemSelector(string $nestedItemSelector): self
    {
        $this->nestedItemSelector = $nestedItemSelector;
        return $this;
    }

    /**
     * Mengatur elemen HTML yang akan digunakan untuk item carousel.
     *
     * @param string $itemElement Nama elemen HTML (misal: 'div').
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setItemElement(string $itemElement): self
    {
        $this->itemElement = $itemElement;
        return $this;
    }

    /**
     * Mengatur elemen HTML yang akan digunakan untuk stage carousel.
     *
     * @param string $stageElement Nama elemen HTML (misal: 'div').
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setStageElement(string $stageElement): self
    {
        $this->stageElement = $stageElement;
        return $this;
    }

    /**
     * Mengatur selector kontainer untuk navigasi (panah).
     *
     * @param string|bool $navContainer Selector CSS atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavContainer($navContainer): self
    {
        $this->navContainer = $navContainer;
        return $this;
    }

    /**
     * Mengatur selector kontainer untuk dots navigasi.
     *
     * @param string|bool $dotsContainer Selector CSS atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDotsContainer($dotsContainer): self
    {
        $this->dotsContainer = $dotsContainer;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan pemeriksaan visibilitas item.
     *
     * @param bool $checkVisible True untuk mengaktifkan pemeriksaan, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setCheckVisible(bool $checkVisible): self
    {
        $this->checkVisible = $checkVisible;
        return $this;
    }

    /**
     * Mengatur transisi slide (misal: 'linear').
     *
     * @param string $slideTransition Nama transisi slide.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setSlideTransition(string $slideTransition): self
    {
        $this->slideTransition = $slideTransition;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan tinggi otomatis untuk carousel.
     *
     * @param bool $autoHeight True untuk mengaktifkan tinggi otomatis, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAutoHeight(bool $autoHeight): self
    {
        $this->autoHeight = $autoHeight;
        return $this;
    }

    /**
     * Mengaktifkan atau menonaktifkan mode Right-To-Left (RTL).
     *
     * @param bool $rtl True untuk mengaktifkan mode RTL, false jika tidak.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setRtl(bool $rtl): self
    {
        $this->rtl = $rtl;
        return $this;
    }

    // CLASSES METHODS
    /**
     * Mengatur kelas CSS untuk status refresh carousel.
     *
     * @param string $refreshClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setRefreshClass(string $refreshClass): self
    {
        $this->refreshClass = $refreshClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk status loading carousel.
     *
     * @param string $loadingClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setLoadingClass(string $loadingClass): self
    {
        $this->loadingClass = $loadingClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk status loaded carousel.
     *
     * @param string $loadedClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setLoadedClass(string $loadedClass): self
    {
        $this->loadedClass = $loadedClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk mode RTL (Right-To-Left) carousel.
     *
     * @param string $rtlClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setRtlClass(string $rtlClass): self
    {
        $this->rtlClass = $rtlClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk state drag carousel.
     *
     * @param string $dragClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDragClass(string $dragClass): self
    {
        $this->dragClass = $dragClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk state grab carousel.
     *
     * @param string $grabClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setGrabClass(string $grabClass): self
    {
        $this->grabClass = $grabClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk stage carousel.
     *
     * @param string $stageClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setStageClass(string $stageClass): self
    {
        $this->stageClass = $stageClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk stage luar carousel.
     *
     * @param string $stageOuterClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setStageOuterClass(string $stageOuterClass): self
    {
        $this->stageOuterClass = $stageOuterClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk kontainer navigasi carousel.
     *
     * @param string $navContainerClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavContainerClass(string $navContainerClass): self
    {
        $this->navContainerClass = $navContainerClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk tombol navigasi carousel.
     *
     * @param string[] $navClass Array string nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setNavClass(array $navClass): self
    {
        $this->navClass = $navClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk kontrol carousel.
     *
     * @param string $controlsClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setControlsClass(string $controlsClass): self
    {
        $this->controlsClass = $controlsClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk dot navigasi carousel.
     *
     * @param string $dotClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDotClass(string $dotClass): self
    {
        $this->dotClass = $dotClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk kontainer dots navigasi carousel.
     *
     * @param string $dotsClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setDotsClass(string $dotsClass): self
    {
        $this->dotsClass = $dotsClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk tinggi otomatis carousel.
     *
     * @param string $autoHeightClass Nama kelas CSS.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setAutoHeightClass(string $autoHeightClass): self
    {
        $this->autoHeightClass = $autoHeightClass;
        return $this;
    }

    /**
     * Mengatur kelas CSS untuk responsif carousel.
     *
     * @param string|bool $responsiveClass Nama kelas CSS atau false untuk default.
     * @return self Instance OptionsOwlCarousel saat ini.
     */
    public function setResponsiveClass($responsiveClass): self
    {
        $this->responsiveClass = $responsiveClass;
        return $this;
    }

    /**
     * Membuat konfigurasi Owl Carousel default.
     *
     * @return self Instance OptionsOwlCarousel dengan konfigurasi default.
     */
    public static function createDefault(): self
    {
        return (new self())
            ->setItems(1)
            ->setLoop(true)
            ->setNav(true)
            ->setDots(true)
            ->setAutoplay(false);
    }

    /**
     * Membuat konfigurasi Owl Carousel responsif default.
     *
     * @return self Instance OptionsOwlCarousel dengan konfigurasi responsif.
     */
    public static function createResponsive(): self
    {
        return self::createDefault()
            ->setResponsive([
                '0' => ['items' => 1],
                '768' => ['items' => 2],
                '1024' => ['items' => 3]
            ]);
    }

    /**
     * Mengonversi opsi carousel ke dalam format array data HTML (data-attribute).
     *
     * @return array Array asosiatif yang cocok untuk atribut data HTML.
     */
    public function toArrayData(): array
    {

        $data = [];
        array_map(function ($value, $key) use (&$data) {
            $data["data-{$key}"] = (string)$value;
        }, $this->jsonSerialize(), array_keys($this->jsonSerialize()));

        return $data;
    }

    /**
     * Mengonversi opsi carousel ke dalam format JSON string.
     *
     * @return string Representasi JSON dari opsi carousel.
     */
    public function toJson(): string
    {
        return json_encode($this->jsonSerialize());
    }

    /**
     * Mengimplementasikan antarmuka JsonSerializable untuk mengonversi objek ke array.
     *
     * Ini memfilter properti yang kosong atau null sebelum diserialisasi ke JSON.
     *
     * @return array Representasi array dari properti objek yang tidak kosong.
     */
    public function jsonSerialize(): array
    {

        $data = get_object_vars($this);

        return array_filter($data, function ($value) {

            if (is_array($value)) {
                return !empty($value);
            }

            if (is_string($value)) {
                return strlen(trim($value)) > 0;
            }

            return !is_null($value);
        });
    }
}
