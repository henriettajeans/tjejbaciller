<?php
/*
Template Name: Genomförda projekt
*/
get_header();
?>
<?php
$name = get_field('project_title');
$description = get_field('project_description');
$image = get_field('project_thumbnail');
$gallery_image = get_field('gallery_images');
$date = get_field('date');
?>
<!-- TODO: general page class name -->
<section class="projects">
    <h2><?php the_title(); ?></h2>
    <?php if ($name) : ?>
        <h5>
            <?php echo $name; ?>
        </h5>
    <?php endif; ?>
    <p> <?php echo $date ?> </p>
    <?php if ($description) : ?>
        <p>
            <?php echo $description; ?>
        <p>
        <article class="post-content">
            <?php
            the_content();
            ?>
        </article>
    <?php endif;
    if ($gallery_image) : ?>
        <div class="gallery">
            <?php foreach ($gallery_image as $image_id) : ?>
                <?php $image = wp_get_attachment_image_src($image_id, 'small'); ?>
                <img src="<?php echo esc_url($image[0]); ?>" />
            <?php endforeach; ?>
        </div>
    <?php
    endif;
    ?>
</section>
<?php
get_footer();
