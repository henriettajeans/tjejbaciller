<?php
// wp_nav_menu();
get_header();
the_post();


?>

<section class="post-wrapper">
    <div class="post-img">
        <?php the_post_thumbnail() ?>
    </div>
    <h2 class="post-title">
        <?php
        the_title(); ?>
    </h2>
    <article class="post-meta">
        <p>
            <i class="fa-regular fa-calendar-days"></i>
            <?php the_date(); ?>
        </p>
        <p>
            <?php the_author_posts_link(); ?>
        </p>
    </article>
    <article class="post-content">
        <?php
        the_content();
        ?>
    </article>
    <article class="comment-wrapper">
        <?php comments_template(); ?>
    </article>
</section>


<?php
get_footer();
