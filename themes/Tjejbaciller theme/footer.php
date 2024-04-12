</main>

<?php do_action('storefront_before_footer'); ?>

<footer id="colophon footer" class="site-footer" role="contentinfo">
    <div class="col-full">
        <?php
        /**
         * Functions hooked in to storefront_footer action
         *
         * @hooked storefront_footer_widgets - 10
         * @hooked storefront_credit         - 20
         */
        do_action('storefront_footer');
        ?>

    </div><!-- .col-full -->
    <section class="footer-box">
        <article>
            <?php dynamic_sidebar('footer-widget-area'); ?>
            <?php dynamic_sidebar(' footer-widget-area1'); ?>

        </article>
        <p class="">© Henrietta Jeansson 2024</p>
    </section>

</footer><!-- #colophon -->



<?php
do_action('storefront_after_footer'); ?>

</div>

<?php wp_footer(); ?>

</body>

</html>