<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <script src="https://kit.fontawesome.com/93096c015c.js" crossorigin="anonymous"></script>
    <title><?php bloginfo("name"); ?></title>
    <?php wp_head(); ?>
</head>


<body>
    <header id="header" role="banner">

        <div class="right quarter">
            <a class="toggle-nav" href="#">&#9776;</a>
        </div>
        <nav class="nav-wrapper">
            <div class="skip-link screen-reader-text">
                <a href="#content" title="<?php esc_attr_e('Skip to content', 'compass'); ?>">
                    <?php _e('Skip to content', 'twentyten'); ?>
                </a>
            </div>
            <?php wp_nav_menu(array("theme_location" => "primary_menu")); ?>
            <!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a> -->
        </nav>
        <?php if (get_header_image()) : ?>
            <div id="site-header">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo absint(get_custom_header()->width); ?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </a>
            </div>
        <?php endif; ?>

    </header>


    <div class="close-nav"></div>

    <main id="content" role="main">