<?php

get_header();
global $wp_query;
?>

<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="blogpost">
    <h2>
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?> </a>
    </h2>

    <article class="blogpost-flex">
        <div id="img-container">
            <?php the_post_thumbnail() ?>
        </div>
        <article>
            <p>
                <i class="fa-regular fa-calendar-days"></i>
                <?php the_date(); ?>
            </p>
            <p>
                <?php the_excerpt(); ?>
            </p>
        </article>
    </article>
</section>

<?php
    endwhile;
endif;
?>
<div>
    <?php
    $total_pages = $wp_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format' => '?paged=%#%',
        'current' => $current_page,
        'total' => $total_pages,
    ));
    ?>
</div>
<?php get_footer(); ?>