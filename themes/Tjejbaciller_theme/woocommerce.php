<!-- Lägg till wp-_hooks eller lägg till klass och id i kontrollpanelen -->

<?php
/**
 * The main template file for WooCommerce.
 *
 * This is the most generic template file in a WooCommerce theme and one of the
 * two required files for a theme (the other being `style.css`).
 *
 * @link https://woocommerce.com/
 *
 * @package YourThemeName
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Check if WooCommerce is active
        if (class_exists('WooCommerce')) {

            // WooCommerce content output
            woocommerce_content();
        } else {

            // If WooCommerce is not active, display a notice
            echo esc_html('Please install and activate WooCommerce to use this theme properly.');
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
