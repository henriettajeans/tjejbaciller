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
</footer><!-- #colophon -->

<section class="footer-box">
    <?php dynamic_sidebar('footer-widget-area'); ?>
</section>
<?php
do_action('storefront_after_footer'); ?>

</div>

<?php wp_footer(); ?>

</body>

</html>