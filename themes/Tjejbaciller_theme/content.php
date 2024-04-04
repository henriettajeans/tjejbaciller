<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="entry">
    <header class="entry-header">
        <span class="posted-on">Publicerad: <?php echo get_the_date(''); ?></span>
    </header>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <p><?php the_excerpt(); ?></p>
    <?php
    ?>

</article>