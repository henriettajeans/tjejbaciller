<?php
/*
Template Name: Genomförda projekt
*/
get_header();
?>

<!-- TODO: general page class name -->
<section class="projects">
    <section>
        <?php

        $name = get_field('project_title');
        $description = get_field('project_description');
        $image = get_field('project_thumbnail');
        $gallery = get_sub_field('projects')

        ?>


        <section class="team-section__container">
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

                    <a href="<?php echo $gallery ?>"></a>



                </article>
        </section>
    </section>

</section>
<?php
get_footer();
