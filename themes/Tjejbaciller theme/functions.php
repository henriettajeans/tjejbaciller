<?php
register_nav_menus(array(
    "primary_menu" => array(
        "theme_location" => "Huvudmeny",
        "menu_class" => "my-primary-menu",
    ),
    "sub_menu" => "Undermeny",
    "footer_menu" => "Footermeny"
));

//Load CSS styling, add function to load javascript and sass
wp_register_style(
    'css-styling',
    get_template_directory_uri() . '/style.css',
    array(),
    false,
    'all'
);
wp_enqueue_style('css-styling');


add_theme_support(
    'post-formats',
    array(
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
    )
);
add_theme_support('responsive-embeds');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('woocommerce');
add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    )
);
$bg_defaults = array(
    'default-image'          => '',
    'default-preset'         => 'default',
    'default-size'           => 'cover',
    'default-repeat'         => 'no-repeat',
    'default-attachment'     => 'scroll',
);

// Custom background color
add_theme_support(
    'custom-background',
    array(
        'default-color' => 'd1e4dd',
        'default-image' => '',  $bg_defaults
    )
);

function theme_register_widget_areas()
{
    $widget_areas = array(
        array(
            'name' => 'Footer Widget Area',
            'id' => 'footer-widget-area',
            'description' => 'This is the footer widget area.',
            'before_widget' => '<div class="sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name' => 'Orientering',
            'id' => 'orientation',
            'description' => 'Dethär är sidomenyn för kategori, författare och arkivinsidan.',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        // Lägg till fler widget-områden här
    );

    foreach ($widget_areas as $widget_area) {
        register_sidebar($widget_area);
    }
}
add_action('widgets_init', 'theme_register_widget_areas');


add_action('init', 'remove_storefront_home_product_categories', 10);
function remove_storefront_home_product_categories()
{
    // Unhook storefront_product_categories() function from 'homepage' action hook
    remove_action('homepage', 'storefront_product_categories', 20);
}

add_action('after_setup_theme', 'remove_actions', 10);
function remove_actions()
{
    remove_action('woocommerce_after_shop_loop', 'storefront_sorting_wrapper', 9);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'storefront_woocommerce_pagination', 30);
    remove_action('woocommerce_after_shop_loop', 'storefront_sorting_wrapper_close', 31);
}

add_action('init', 'storefront_remove_storefront_breadcrumbs');

function storefront_remove_storefront_breadcrumbs()
{

    remove_action('storefront_before_content', 'woocommerce_breadcrumb', 10);
}
function hide_shipping_when_free_is_available($rates, $package)
{
    $new_rates = array();
    foreach ($rates as $rate_id => $rate) {
        // Only modify rates if free_shipping is present.
        if ('free_shipping' === $rate->method_id) {
            $new_rates[$rate_id] = $rate;
            break;
        }
    }

    if (!empty($new_rates)) {
        //Save local pickup if it's present.
        foreach ($rates as $rate_id => $rate) {
            if ('local_pickup' === $rate->method_id) {
                $new_rates[$rate_id] = $rate;
                break;
            }
        }
        return $new_rates;
    }

    return $rates;
}

add_filter('woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2);


add_action('woocommerce_before_cart_table', 'cart_page_notice');

function get_free_shipping_min_amount()
{
    $zone_ids = array_keys(array('') + WC_Shipping_Zones::get_zones());
    foreach ($zone_ids as $zone_id) {
        $shipping_zone = new WC_Shipping_Zone($zone_id);

        $shipping_methods = $shipping_zone->get_shipping_methods(true, 'values');

        foreach ($shipping_methods as $instance_id => $shipping_method) {
            if ($shipping_method->id == "free_shipping") {
                return $shipping_method->min_amount;
            }
        }
    }
}
function cart_page_notice()
{
    $min_amount  = (int)get_free_shipping_min_amount();
    $current = WC()->cart->subtotal;
    if ($current < $min_amount) {
        $added_text = '<div class="woocommerce-message">Köp produkter för ' . wc_price($min_amount - $current) . ' till gratis frakt!<br/>';
        $return_to = wc_get_page_permalink('shop');
        $notice = sprintf('%s<a href="%s">%s</a>', $added_text, esc_url($return_to), 'Continue shopping</div>');
        echo $notice;
    }
}

function post_type_services()
{
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'post-formats',
    );

    $labels = array(
        'name' => _x('Tjänster', 'plural'),
        'singular_name' => _x('Tjänst', 'singular'),
        'menu_name' => _x('Tjänster', 'admin menu'),
        'name_admin_bar' => _x('Tjänster', 'admin bar'),
        'add_new' => _x('Lägg till en tjänst', 'add new'),
        'add_new_item' => __('Lägg en ny tjänst'),
        'new_item' => __('Ny tjänst'),
        'edit_item' => __('Redigera tjänsten'),
        'view_item' => __('Visa tjänst'),
        'all_items' => __('Alla tjänster'),
        'search_items' => __('Sök bland tjänster'),
        'not_found' => __('Ingen tjänst hittades'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'has_archive' => false,
        'hierarchical' => true,
        // TODO: change icon to proper one
        'menu_icon' => 'dashicons-store'
    );

    register_post_type('services', $args);
}

add_action('init', 'post_type_services');

function post_type_projects()
{
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'post-formats',
    );

    $labels = array(
        'name' => _x('Projekt', 'plural'),
        'singular_name' => _x('Projekt', 'singular'),
        'menu_name' => _x('Projekt', 'admin menu'),
        'name_admin_bar' => _x('Projekt', 'admin bar'),
        'add_new' => _x('Lägg till nytt projekt', 'add new'),
        'add_new_item' => __('Lägg till ett nytt projekt'),
        'new_item' => __('Nytt projekt'),
        'edit_item' => __('Redigera projekt'),
        'view_item' => __('Visa projekt'),
        'all_items' => __('Alla projekt'),
        'search_items' => __('Sök bland projekt'),
        'not_found' => __('Inget projekt hittades'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'projects'),
        'has_archive' => false,
        'hierarchical' => true,
        // TODO: change icon to proper one
        'menu_icon' => 'dashicons-store'
    );

    register_post_type('projects', $args);
}

add_action('init', 'post_type_projects');

add_action('init', 'remove_storefront_header_search');

function remove_storefront_header_search()
{

    remove_action('storefront_header', 'storefront_product_search', 40);
}
