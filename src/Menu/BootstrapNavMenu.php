<?php

namespace WpWidgets\Menu;


final class BootstrapNavMenu extends WalkerNavMenu
{


    public function __construct()
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
    }
}
