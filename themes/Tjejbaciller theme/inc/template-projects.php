<?php
/*
Template Name: Genomförda projekt
*/
get_header();
?>
<h2>
    <?php
    the_title();
    ?>
</h2>
<!-- TODO: general page class name -->
<section class="projects-wrapper">

    <?php
    query_posts(array(
        'post_type' => 'projects'
    )); ?>
    <?php
    while (have_posts()) : the_post();

        $name = get_field('project_title');
        $description = get_field('project_description');
        $image = get_field('project_thumbnail');
        $date = get_field('date');


    ?>

    <section class="projects-container">
        <a href="<?php the_permalink(); ?>">
            <h3> <?php the_title(); ?> </h3>


            <img class="projects-container__img" src="<?php echo $image; ?>">
            <p> <?php echo $date ?> </p>
        </a>
    </section>

    <?php
    endwhile; ?>
</section>


<?php
get_footer();