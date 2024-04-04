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
    <h2>

        <?php the_title(); ?>

    </h2>
    <?php
    while (have_posts()) : the_post();
    ?>
    <article>
        <h4>
            <?php echo the_title(); ?>
        </h4>
    </article>
    <?php
    endwhile; ?>
</section>
<?php
get_footer();