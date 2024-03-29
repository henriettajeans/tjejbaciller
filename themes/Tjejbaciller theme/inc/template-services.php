<?php
/*
Template Name: Erbjudna tjänster
*/
get_header();
?>

<!-- TODO: general page class name -->
<section class="services">
    <?php
    query_posts(array(
        'post_type' => 'services'
    )); ?>
    <h1><?php the_title()  ?></h1>
    <?php
    while (have_posts()) : the_post(); ?>
        <article class="store-single">
            <h2><?php the_title(); ?></h2>
            <div class="store-meta">
                <p><?php the_content(); ?></p>
            </div>
            <div class="store-image">
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
            </div>
        </article>
    <?php
    endwhile; ?>


</section>