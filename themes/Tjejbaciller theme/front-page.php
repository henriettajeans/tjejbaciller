<?php
get_header();
?>
<section class="hero-section">
    <h1><?php the_title(); ?></h1>
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
    ?>
    <!-- <section class="hero-section__container">
        <img class="hero-section__container_img" src="<?php the_field('hero_image') ?>">
        <article class="hero-section__container__text">
            <h2><?php the_field('hero_title') ?></h2>
            <p><?php the_field('hero_text') ?></p>
        </article>
        <?php
        endwhile;
    endif;
        ?>
    </section> -->
    <?php
            get_footer(); ?>