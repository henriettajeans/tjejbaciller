<?php wp_footer(); ?>

</div>
</div>
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

<?php
dynamic_sidebar('footer-widget-area');
do_action('storefront_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>