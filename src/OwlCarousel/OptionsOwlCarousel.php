<?php

declare(strict_types=1);

namespace WpWidgets\OwlCarousel;

use JsonSerializable;
use InvalidArgumentException;


class OptionsOwlCarousel implements JsonSerializable
{
    // OPTIONS
    /** @var int|null */
    public $items;
    /** @var int|null */
    public $margin;
    /** @var bool|null */
    public $loop;
    /** @var bool|null */
    public $center;
    /** @var bool|null */
    public $mouseDrag;
    /** @var bool|null */
    public $touchDrag;
    /** @var bool|null */
    public $pullDrag;
    /** @var bool|null */
    public $freeDrag;
    /** @var int|null */
    public $stagePadding;
    /** @var bool|null */
    public $merge;
    /** @var bool|null */
    public $mergeFit;
    /** @var bool|null */
    public $autoWidth;
    /** @var int|string|null */
    public $startPosition;
    /** @var bool|null */
    public $URLhashListener;
    /** @var bool|null */
    public $nav;
    /** @var bool|null */
    public $rewind;
    /** @var string[]|null */
    public $navText;
    /** @var string|null */
    public $navElement;
    /** @var int|string|null */
    public $slideBy;
    /** @var bool|null */
    public $dots;
    /** @var int|bool|null */
    public $dotsEach;
    /** @var bool|null */
    public $dotsData;
    /** @var bool|null */
    public $lazyLoad;
    /** @var int|null */
    public $lazyLoadEager;
    /** @var bool|null */
    public $autoplay;
    /** @var int|null */
    public $autoplayTimeout;
    /** @var bool|null */
    public $autoplayHoverPause;
    /** @var int|bool|null */
    public $smartSpeed;
    /** @var int|bool|null */
    public $fluidSpeed;
    /** @var int|bool|null */
    public $autoplaySpeed;
    /** @var int|bool|null */
    public $navSpeed;
    /** @var int|bool|null */
    public $dotsSpeed;
    /** @var int|bool|null */
    public $dragEndSpeed;
    /** @var bool|null */
    public $callbacks;
    /** @var array<string, Options>|null */
    public $responsive;
    /** @var int|null */
    public $responsiveRefreshRate;
    /** @var string|null */
    public $responsiveBaseElement;
    /** @var bool|null */
    public $video;
    /** @var int|bool|null */
    public $videoHeight;
    /** @var int|bool|null */
    public $videoWidth;
    /** @var string|bool|null */
    public $animateOut;
    /** @var string|bool|null */
    public $animateIn;
    /** @var string|null */
    public $fallbackEasing;
    /** @var callable|null */
    public $info;
    /** @var string|null */
    public $nestedItemSelector;
    /** @var string|null */
    public $itemElement;
    /** @var string|null */
    public $stageElement;
    /** @var string|bool|null */
    public $navContainer;
    /** @var string|bool|null */
    public $dotsContainer;
    /** @var bool|null */
    public $checkVisible;
    /** @var string|null */
    public $slideTransition;
    /** @var bool|null */
    public $autoHeight;
    /** @var bool|null */
    public $rtl;

    // CLASSES
    /** @var string|null */
    public $refreshClass;
    /** @var string|null */
    public $loadingClass;
    /** @var string|null */
    public $loadedClass;
    /** @var string|null */
    public $rtlClass;
    /** @var string|null */
    public $dragClass;
    /** @var string|null */
    public $grabClass;
    /** @var string|null */
    public $stageClass;
    /** @var string|null */
    public $stageOuterClass;
    /** @var string|null */
    public $navContainerClass;
    /** @var string[]|null */
    public $navClass;
    /** @var string|null */
    public $controlsClass;
    /** @var string|null */
    public $dotClass;
    /** @var string|null */
    public $dotsClass;
    /** @var string|null */
    public $autoHeightClass;
    /** @var string|bool|null */
    public $responsiveClass;


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
     * @param int $items
     * @return self
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
     * @param int $margin
     * @return self
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
     * @param bool $loop
     * @return self
     */
    public function setLoop(bool $loop): self
    {
        $this->loop = $loop;
        return $this;
    }

    /**
     * @param bool $center
     * @return self
     */
    public function setCenter(bool $center): self
    {
        $this->center = $center;
        return $this;
    }

    /**
     * @param bool $mouseDrag
     * @return self
     */
    public function setMouseDrag(bool $mouseDrag): self
    {
        $this->mouseDrag = $mouseDrag;
        return $this;
    }

    /**
     * @param bool $touchDrag
     * @return self
     */
    public function setTouchDrag(bool $touchDrag): self
    {
        $this->touchDrag = $touchDrag;
        return $this;
    }

    /**
     * @param bool $pullDrag
     * @return self
     */
    public function setPullDrag(bool $pullDrag): self
    {
        $this->pullDrag = $pullDrag;
        return $this;
    }

    /**
     * @param bool $freeDrag
     * @return self
     */
    public function setFreeDrag(bool $freeDrag): self
    {
        $this->freeDrag = $freeDrag;
        return $this;
    }

    /**
     * @param int $stagePadding
     * @return self
     */
    public function setStagePadding(int $stagePadding): self
    {
        $this->stagePadding = $stagePadding;
        return $this;
    }

    /**
     * @param bool $merge
     * @return self
     */
    public function setMerge(bool $merge): self
    {
        $this->merge = $merge;
        return $this;
    }

    /**
     * @param bool $mergeFit
     * @return self
     */
    public function setMergeFit(bool $mergeFit): self
    {
        $this->mergeFit = $mergeFit;
        return $this;
    }

    /**
     * @param bool $autoWidth
     * @return self
     */
    public function setAutoWidth(bool $autoWidth): self
    {
        $this->autoWidth = $autoWidth;
        return $this;
    }

    /**
     * @param int|string $startPosition
     * @return self
     */
    public function setStartPosition($startPosition): self
    {
        $this->startPosition = $startPosition;
        return $this;
    }

    /**
     * @param bool $URLhashListener
     * @return self
     */
    public function setURLhashListener(bool $URLhashListener): self
    {
        $this->URLhashListener = $URLhashListener;
        return $this;
    }

    /**
     * @param bool $nav
     * @return self
     */
    public function setNav(bool $nav): self
    {
        $this->nav = $nav;
        return $this;
    }

    /**
     * @param bool $rewind
     * @return self
     */
    public function setRewind(bool $rewind): self
    {
        $this->rewind = $rewind;
        return $this;
    }

    /**
     * @param string[] $navText
     * @return self
     */
    public function setNavText(array $navText): self
    {
        $this->navText = $navText;
        return $this;
    }

    /**
     *
     * @return self
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
     * @param string $navElement
     * @return self
     */
    public function setNavElement(string $navElement): self
    {
        $this->navElement = $navElement;
        return $this;
    }

    /**
     * @param int|string $slideBy
     * @return self
     */
    public function setSlideBy($slideBy): self
    {
        $this->slideBy = $slideBy;
        return $this;
    }

    /**
     * @param bool $dots
     * @return self
     */
    public function setDots(bool $dots): self
    {
        $this->dots = $dots;
        return $this;
    }

    /**
     * @param int|bool $dotsEach
     * @return self
     */
    public function setDotsEach($dotsEach): self
    {
        $this->dotsEach = $dotsEach;
        return $this;
    }

    /**
     * @param bool $dotsData
     * @return self
     */
    public function setDotsData(bool $dotsData): self
    {
        $this->dotsData = $dotsData;
        return $this;
    }

    /**
     * @param bool $lazyLoad
     * @return self
     */
    public function setLazyLoad(bool $lazyLoad): self
    {
        $this->lazyLoad = $lazyLoad;
        return $this;
    }

    /**
     * @param int $lazyLoadEager
     * @return self
     */
    public function setLazyLoadEager(int $lazyLoadEager): self
    {
        $this->lazyLoadEager = $lazyLoadEager;
        return $this;
    }

    /**
     * @param bool $autoplay
     * @return self
     */
    public function setAutoplay(bool $autoplay): self
    {
        $this->autoplay = $autoplay;
        return $this;
    }

    /**
     * @param int $autoplayTimeout
     * @return self
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
     * @param bool $autoplayHoverPause
     * @return self
     */
    public function setAutoplayHoverPause(bool $autoplayHoverPause): self
    {
        $this->autoplayHoverPause = $autoplayHoverPause;
        return $this;
    }

    /**
     * @param int|bool $smartSpeed
     * @return self
     */
    public function setSmartSpeed($smartSpeed): self
    {
        $this->smartSpeed = $smartSpeed;
        return $this;
    }

    /**
     * @param int|bool $fluidSpeed
     * @return self
     */
    public function setFluidSpeed($fluidSpeed): self
    {
        $this->fluidSpeed = $fluidSpeed;
        return $this;
    }

    /**
     * @param int|bool $autoplaySpeed
     * @return self
     */
    public function setAutoplaySpeed($autoplaySpeed): self
    {
        $this->autoplaySpeed = $autoplaySpeed;
        return $this;
    }

    /**
     * @param int|bool $navSpeed
     * @return self
     */
    public function setNavSpeed($navSpeed): self
    {
        $this->navSpeed = $navSpeed;
        return $this;
    }

    /**
     * @param int|bool $dotsSpeed
     * @return self
     */
    public function setDotsSpeed($dotsSpeed): self
    {
        $this->dotsSpeed = $dotsSpeed;
        return $this;
    }

    /**
     * @param int|bool $dragEndSpeed
     * @return self
     */
    public function setDragEndSpeed($dragEndSpeed): self
    {
        $this->dragEndSpeed = $dragEndSpeed;
        return $this;
    }

    /**
     * @param bool $callbacks
     * @return self
     */
    public function setCallbacks(bool $callbacks): self
    {
        $this->callbacks = $callbacks;
        return $this;
    }

    /**
     * @param array<string, Options> $responsive
     * @return self
     */
    public function setResponsive(array $responsive): self
    {
        $this->responsive = $responsive;
        return $this;
    }

    /**
     * @param int $responsiveRefreshRate
     * @return self
     */
    public function setResponsiveRefreshRate(int $responsiveRefreshRate): self
    {
        $this->responsiveRefreshRate = $responsiveRefreshRate;
        return $this;
    }

    /**
     * @param string $responsiveBaseElement
     * @return self
     */
    public function setResponsiveBaseElement(string $responsiveBaseElement): self
    {
        $this->responsiveBaseElement = $responsiveBaseElement;
        return $this;
    }

    /**
     * @param bool $video
     * @return self
     */
    public function setVideo(bool $video): self
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @param int|bool $videoHeight
     * @return self
     */
    public function setVideoHeight($videoHeight): self
    {
        $this->videoHeight = $videoHeight;
        return $this;
    }

    /**
     * @param int|bool $videoWidth
     * @return self
     */
    public function setVideoWidth($videoWidth): self
    {
        $this->videoWidth = $videoWidth;
        return $this;
    }

    /**
     * @param string|bool $animateOut
     * @return self
     */
    public function setAnimateOut($animateOut): self
    {
        $this->animateOut = $animateOut;
        return $this;
    }

    /**
     * @param string|bool $animateIn
     * @return self
     */
    public function setAnimateIn($animateIn): self
    {
        $this->animateIn = $animateIn;
        return $this;
    }

    /**
     * @param string $fallbackEasing
     * @return self
     */
    public function setFallbackEasing(string $fallbackEasing): self
    {
        $this->fallbackEasing = $fallbackEasing;
        return $this;
    }

    /**
     * @param callable $info
     * @return self
     */
    public function setInfo(callable $info): self
    {
        $this->info = $info;
        return $this;
    }

    /**
     * @param string $nestedItemSelector
     * @return self
     */
    public function setNestedItemSelector(string $nestedItemSelector): self
    {
        $this->nestedItemSelector = $nestedItemSelector;
        return $this;
    }

    /**
     * @param string $itemElement
     * @return self
     */
    public function setItemElement(string $itemElement): self
    {
        $this->itemElement = $itemElement;
        return $this;
    }

    /**
     * @param string $stageElement
     * @return self
     */
    public function setStageElement(string $stageElement): self
    {
        $this->stageElement = $stageElement;
        return $this;
    }

    /**
     * @param string|bool $navContainer
     * @return self
     */
    public function setNavContainer($navContainer): self
    {
        $this->navContainer = $navContainer;
        return $this;
    }

    /**
     * @param string|bool $dotsContainer
     * @return self
     */
    public function setDotsContainer($dotsContainer): self
    {
        $this->dotsContainer = $dotsContainer;
        return $this;
    }

    /**
     * @param bool $checkVisible
     * @return self
     */
    public function setCheckVisible(bool $checkVisible): self
    {
        $this->checkVisible = $checkVisible;
        return $this;
    }

    /**
     * @param string $slideTransition
     * @return self
     */
    public function setSlideTransition(string $slideTransition): self
    {
        $this->slideTransition = $slideTransition;
        return $this;
    }

    /**
     * @param bool $autoHeight
     * @return self
     */
    public function setAutoHeight(bool $autoHeight): self
    {
        $this->autoHeight = $autoHeight;
        return $this;
    }

    /**
     * @param bool $rtl
     * @return self
     */
    public function setRtl(bool $rtl): self
    {
        $this->rtl = $rtl;
        return $this;
    }

    // CLASSES METHODS
    /**
     * @param string $refreshClass
     * @return self
     */
    public function setRefreshClass(string $refreshClass): self
    {
        $this->refreshClass = $refreshClass;
        return $this;
    }

    /**
     * @param string $loadingClass
     * @return self
     */
    public function setLoadingClass(string $loadingClass): self
    {
        $this->loadingClass = $loadingClass;
        return $this;
    }

    /**
     * @param string $loadedClass
     * @return self
     */
    public function setLoadedClass(string $loadedClass): self
    {
        $this->loadedClass = $loadedClass;
        return $this;
    }

    /**
     * @param string $rtlClass
     * @return self
     */
    public function setRtlClass(string $rtlClass): self
    {
        $this->rtlClass = $rtlClass;
        return $this;
    }

    /**
     * @param string $dragClass
     * @return self
     */
    public function setDragClass(string $dragClass): self
    {
        $this->dragClass = $dragClass;
        return $this;
    }

    /**
     * @param string $grabClass
     * @return self
     */
    public function setGrabClass(string $grabClass): self
    {
        $this->grabClass = $grabClass;
        return $this;
    }

    /**
     * @param string $stageClass
     * @return self
     */
    public function setStageClass(string $stageClass): self
    {
        $this->stageClass = $stageClass;
        return $this;
    }

    /**
     * @param string $stageOuterClass
     * @return self
     */
    public function setStageOuterClass(string $stageOuterClass): self
    {
        $this->stageOuterClass = $stageOuterClass;
        return $this;
    }

    /**
     * @param string $navContainerClass
     * @return self
     */
    public function setNavContainerClass(string $navContainerClass): self
    {
        $this->navContainerClass = $navContainerClass;
        return $this;
    }

    /**
     * @param string[] $navClass
     * @return self
     */
    public function setNavClass(array $navClass): self
    {
        $this->navClass = $navClass;
        return $this;
    }

    /**
     * @param string $controlsClass
     * @return self
     */
    public function setControlsClass(string $controlsClass): self
    {
        $this->controlsClass = $controlsClass;
        return $this;
    }

    /**
     * @param string $dotClass
     * @return self
     */
    public function setDotClass(string $dotClass): self
    {
        $this->dotClass = $dotClass;
        return $this;
    }

    /**
     * @param string $dotsClass
     * @return self
     */
    public function setDotsClass(string $dotsClass): self
    {
        $this->dotsClass = $dotsClass;
        return $this;
    }

    /**
     * @param string $autoHeightClass
     * @return self
     */
    public function setAutoHeightClass(string $autoHeightClass): self
    {
        $this->autoHeightClass = $autoHeightClass;
        return $this;
    }

    /**
     * @param string|bool $responsiveClass
     * @return self
     */
    public function setResponsiveClass($responsiveClass): self
    {
        $this->responsiveClass = $responsiveClass;
        return $this;
    }

    /**
     * Create default configuration
     * @return self
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
     * Create responsive configuration
     * @return self
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
     *
     * @return array
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
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->jsonSerialize());
    }

    /**
     *
     * @return array
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
