<?php
get_header();
?>

<!-- TODO: general page class name -->
<section class="services">


    <article>
        <?php echo the_title();

        $gallery_images = get_field('service_gallery');

        if ($gallery_images) : ?>
            <div class="gallery">
                <?php foreach ($gallery_images as $image_id) : ?>
                    <?php $image = wp_get_attachment_image_src($image_id, 'full'); ?>
                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title($image_id)); ?>" />
                <?php endforeach; ?>
            </div>
            <article>
                <article>
                    <?php
                    $gallery_images = get_field('service_gallery');

                    // Check if there are images in the gallery
                    if ($gallery_images) : ?>
                        <div class="gallery">
                            <?php foreach ($gallery_images as $image_id) : ?>
                                <?php $image = wp_get_attachment_image_src($image_id, 'small'); ?>
                                <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title($image_id)); ?>" />
                            <?php endforeach; ?>
                        </div>
                    <?php
                    endif;
                    ?>

                </article>
            </article>
        <?php
        endif;
        ?>


</section>
<?php
get_footer();
