<?php

namespace WpWidgets\Menu;


final class BootstrapNavMenu extends WalkerNavMenu
{


    public function __construct(array $options = []) {}

    public function render(): string
    {
        return implode(PHP_EOL, [
            $this->renderMenuItem(),
        ]);
    }

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

    private function renderNavBarBrand() {}
    private function renderSearchInput() {}
}
