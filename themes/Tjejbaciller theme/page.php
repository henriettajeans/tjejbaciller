<?php
get_header();
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
?>
<section class="post-wrapper">

    <?php the_content(); ?>
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
<?php
get_footer(); ?>