<?php
get_header();
?>
<?php

// Check rows exists.
if (have_rows('hero-menu')) :

    // Loop through rows.
    while (have_rows('hero-menu')) : the_row();

        // Load sub field value.
        $name = get_sub_field('hero-menu-name');
?>
<h3> <?php echo esc_html($name);  ?> </h3>
<?php
    // End loop.
    endwhile;

// No value.
else :
// Do something...
endif;

get_footer(); ?>