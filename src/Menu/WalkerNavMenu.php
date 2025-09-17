<?php

namespace WpWidgets\Menu;

use Walker_Nav_Menu;
use WP_Post;
use Yiisoft\Html\Html;

/**
 * WalkerNavMenu
 * Kelas abstrak ini memperluas `Walker_Nav_Menu` WordPress untuk menyediakan fungsionalitas dasar
 * dalam membangun menu navigasi kustom. Ini menyediakan metode untuk menangani level menu, item menu,
 * dan logika terkait lainnya.
 */
abstract class WalkerNavMenu extends Walker_Nav_Menu
{

    /**
     * Merender menu navigasi. Metode ini harus diimplementasikan oleh kelas turunan.
     *
     * @return string Representasi HTML dari menu navigasi.
     */
    abstract public function render(): string;

    /**
     * Memulai output untuk level baru dari daftar item menu.
     *
     * @param string $output Output HTML yang akan dimodifikasi.
     * @param int $depth Kedalaman (indeks) dari item yang sedang diproses. Level atas adalah 0.
     * @param object|array|null $args Argumen yang digunakan untuk mengontrol cara item menu ditampilkan.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {

        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        $classes = array('dropdown-menu');
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }


    /**
     * Memulai output untuk elemen item menu.
     *
     * @param string $output Output HTML yang akan dimodifikasi.
     * @param object $item Objek item menu saat ini.
     * @param int $depth Kedalaman (indeks) dari item yang sedang diproses. Level atas adalah 0.
     * @param object|array|null $args Argumen yang digunakan untuk mengontrol cara item menu ditampilkan.
     * @param int $id ID item menu saat ini.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {

        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);
        $navItem = $this->hasCurrent($item->classes) ? 'nav-item active' : 'nav-item';
        $navItem = $this->hasChildren($item->classes) ? $navItem . ' dropdown' : $navItem;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter([$navItem]), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        if ($this->hasParent($item)) {
            $output .= $indent . '<li class="dropdown-nav-item" ' . $id . '>';
        } else {
            $output .= $indent . '<li' . $id . $class_names . '>';
        }


        $atts = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        // dropdown-item nav-link active
        $class = $this->hasParent($item) ? 'dropdown-item' : 'nav-link';
        // $class = $this->hasCurrent($item->classes) ? $class . ' active' : $class;
        $atts['class'] = $class;

        // data-toggle
        if ($this->hasChildren($item->classes)) {
            $atts['class'] = $class . ' d-flex';
            $atts['role'] = 'button';
            $atts['data-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {

            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        if ($this->hasChildren($item->classes)) {
            $title = implode('', [
                Html::span($title, ['class' => 'dropdown-title']),
                Html::span('arrow_drop_down', ['class' => 'material-icons-outlined'])
            ]);
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }


    /**
     *
     * @param array $classes
     * @return bool
     */
    private function hasChildren(array $classes): bool
    {
        return in_array('menu-item-has-children', $classes);
    }

    /**
     *
     * @param array $classes
     * @return bool
     */
    private function hasCurrent(array $classes): bool
    {
        return in_array('current_page_item', $classes);
    }


    /**
     *
     * @param \WP_Post $post
     * @return bool
     */
    private function hasParent(WP_Post $post): bool
    {
        return property_exists($post, 'menu_item_parent') && $post->menu_item_parent !== '0';
    }
}
