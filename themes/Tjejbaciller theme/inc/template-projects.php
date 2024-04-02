<?php
/*
Template Name: Genomförda projekt
*/
get_header();
?>

<!-- TODO: general page class name -->
<section class="projects">
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
            $gallery = get_sub_field('projects')

        ?>


            <section class="team-section__container">
                <article class="team-section__container__text">
                    <?php if ($name) : ?>
                        <h4>
                            <?php echo $name; ?>
                        </h4>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <p>
                            <?php echo $description; ?>
                        <p>
                        <?php endif; ?>
                        <article>
                            <?php if (have_rows('projects')) :
                                while (have_rows('projects')) : the_row();
                            ?>
                                    <a href="<?php echo $gallery ?>"></a>

                            <?php endwhile;
                            endif; ?>
                        </article>

                </article>

                <img class="team-section__container__img" src="<?php echo $image; ?>">
            </section>
    </section>
<?php
        endwhile; ?>

</section>
<?php
get_footer();
