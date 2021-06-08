<?php

/**
 * The template for displaying the footer
 *
 * @package paynterlaw
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <!-- Contact form -->
    <?= get_template_part('template-parts/form', 'contact'); ?>
    <!-- Footer content -->
    <?= get_template_part('template-parts/content', 'footer') ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>