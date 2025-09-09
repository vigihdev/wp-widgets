<?php

namespace WpWidgets\Menu;

use Walker_Nav_Menu;
use WP_Post;
use Yiisoft\Html\Html;

abstract class WalkerNavMenu extends Walker_Nav_Menu
{

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

        $output .= $indent . '<li' . $id . $class_names . '>';

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
            $title = $title . ' ' . Html::span('arrow_drop_down', ['class' => 'material-icons-outlined'])->render();
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
