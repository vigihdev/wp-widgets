<?php

namespace WpWidgets\Menu;


/**
 * BootstrapNavMenu
 * Kelas ini memperluas `WalkerNavMenu` untuk membuat menu navigasi WordPress yang diformat dengan Bootstrap.
 */
final class BootstrapNavMenu extends WalkerNavMenu
{


    /**
     * Konstruktor BootstrapNavMenu.
     *
     * @param array $options Opsi tambahan untuk menu navigasi.
     */
    public function __construct(array $options = []) {}

    /**
     * Merender menu navigasi Bootstrap.
     *
     * @return string Representasi HTML dari menu navigasi.
     */
    public function render(): string
    {
        return implode(PHP_EOL, [
            $this->renderMenuItem(),
        ]);
    }

    /**
     * Merender item-item menu navigasi.
     *
     * @return string Representasi HTML dari item menu navigasi.
     */
    private function renderMenuItem(): string
    {

        $menu = wp_nav_menu(array(
            'name' => 'primary',
            'container' => false,
            'echo' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav">%3$s</ul>',
            'depth' => 2,
            'walker' => $this,
        ));

        return (string)$menu;
    }

    /**
     * Merender merek (brand) navbar. Metode ini saat ini kosong dan dapat diperluas.
     */
    private function renderNavBarBrand() {}
    /**
     * Merender input pencarian. Metode ini saat ini kosong dan dapat diperluas.
     */
    private function renderSearchInput() {}
}
