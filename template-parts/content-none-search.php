<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paynterlaw
 */

?>

<section class="no-results not-found">

    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'paynterlaw'); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php if (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'paynterlaw'); ?></p>
        <?php endif; ?>
    </div><!-- .page-content -->

</section><!-- .no-results -->