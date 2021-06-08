<?php

class Mobile_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        // Depth-dependent classes.
        $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
        $display_depth = ($depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ($display_depth >= 2 ? 'sub-sub-menu' : ''),
        );
        $class_names = implode(' ', $classes);

        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '"><div class="wrapper sub-menu-grid"><div class="sub-nav-items">' . "\n";
    }

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            ($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
            ($depth >= 2 ? 'sub-sub-menu-item' : ''),
            ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        // Passed classes.
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // Link attributes.
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';


        // Build HTML output and pass through the proper filter (A tag).
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after,
            $args->after,
        );
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        // Close first level of divs (sub-nav-items)
        $output .= '</div><div class="sub-menu-page-info">';

        $menu_name = 'menu-1';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        // Run query to get all menu items
        $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));

        // Loop through array of returned menu items
        foreach ($menuitems as $key => $item) {
            if ($item->menu_item_parent) {
                // Build html
                $page_id = (get_post_meta($item->ID, '_menu_item_object_id', true));
                $menu_item_parent_id = get_post_meta($item->menu_item_parent, '_menu_item_object_id', true);
                $menu_item_parent_title = get_the_title($menu_item_parent_id);
                $menu_item_parent_link = get_permalink($menu_item_parent_id);
                $get_child_pages = get_field('dynamically_pull_child_pages', $menu_item_parent_id);

                // If the option is selected: get all children of the current parent item
                if ($get_child_pages) {
                    $child_args = array(
                        'post_type' => get_post_type($page_id),
                        'posts_per_page' => -1,
                        'post_parent' => 0
                    );
                    $child_query = new WP_Query($child_args);
                    // $child_title = get_the_title($page_id);
                    $html = "<div class='sub-menu-page-info-content' data-sibling='nav-menu-item-" . $item->menu_item_parent . "'><h3 class='sub-menu-subtitle sub-menu-dynamic-children'><span class='sub-menu-return-arrow'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"11.414\" viewBox=\"0 0 16 11.414\"><defs><style>.a{fill:none;stroke:#1b1b1b;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g transform=\"translate(-0.5 0.207)\"><path class=\"a\" d=\"M0,.5H15\" transform=\"translate(0.5 5)\"/><path class=\"a\" d=\"M0,0,5,5,0,10\" transform=\"translate(10.5 0.5)\"/></g></svg></span>{$menu_item_parent_title}</h3>";
                    $html .= "<ul class='sub-menu-child-query'>";
                    if ($child_query->have_posts()) : while ($child_query->have_posts()) : $child_query->the_post();
                            $child_page_title = get_the_title($child_query->post->ID);
                            $html .= "<li><a href='" . get_permalink($child_query->post->ID) . "'>{$child_page_title}</a></li>";
                        endwhile;
                    endif;
                    $html .= "<a href='{$menu_item_parent_link}' class='sub-menu-parent-link'>explore all {$menu_item_parent_title}</a>";
                    $html .= "</ul></div>";
                    // Render output
                    $output .= $html;
                    wp_reset_query();
                } else {
                    $title = $item->title;
                    $cta_link = get_permalink($page_id);
                    $html = "<div class='sub-menu-page-info-content' data-sibling='nav-menu-item-" . $item->menu_item_parent . "'>";
                    $menuitems[$key - 1]->menu_item_parent !== $item->menu_item_parent ? $html .= "<h3 class='sub-menu-subtitle'><span class='sub-menu-return-arrow'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"11.414\" viewBox=\"0 0 16 11.414\"><defs><style>.a{fill:none;stroke:#1b1b1b;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g transform=\"translate(-0.5 0.207)\"><path class=\"a\" d=\"M0,.5H15\" transform=\"translate(0.5 5)\"/><path class=\"a\" d=\"M0,0,5,5,0,10\" transform=\"translate(10.5 0.5)\"/></g></svg></span>{$menu_item_parent_title}</h3>" : null;
                    $html .= "<a href='{$cta_link}'>{$title}</a>";
                    $html .= "</div>";
                    // Render output
                    $output .= $html;
                }
            }
        }

        $output .= '</div></div></ul>';
    }
}
