<?php
/*
Template Name: Genomförda projekt
*/
get_header();
?>

<!-- TODO: general page class name -->
<section class="projects">
    <h2>
        <?php
        the_title();
        ?>
    </h2>
    <?php
    query_posts(array(
        'post_type' => 'projects'
    )); ?>
    <section>
        <?php
        while (have_posts()) : the_post();

            $name = get_field('project_title');
            $description = get_field('project_description');
            $image = get_field('project_thumbnail');

        ?>


            <section class="team-section__container">
                <article class="team-section__container__text">
                    <?php if ($name) : ?>
                        <h4>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo $name; ?>
                            </a>
                        </h4>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <p>
                            <?php echo $description; ?>
                        <p>
                        <?php endif; ?>
                </article>

                <img class="team-section__container__img" src="<?php echo $image; ?>">
            </section>
    </section>
<?php
        endwhile; ?>

</section>
<?php
get_footer();
