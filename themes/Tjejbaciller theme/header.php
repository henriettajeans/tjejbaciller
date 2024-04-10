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

        <div id="wrapper" class="hfeed">
            <section class="bar-wrapper">
                <h1>
                    <?php bloginfo("name"); ?>
                </h1>
                <!-- <div class="bar-wrapper_search">
                    <?php get_search_form(); ?>
                </div> -->
            </section>
            <section class="nav-wrapper">
                <?php wp_nav_menu(array("theme_location" => "primary_menu")); ?>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </section>

    </header>
    <main id="content" role="main">