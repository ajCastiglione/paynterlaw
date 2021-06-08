<?php

// Case study - single template
$content = get_field('notable_cases_content');

wp_enqueue_style('case-study-single-css', get_template_directory_uri() . '/components/dist/case-study-single/case-study-single.css');

?>

<?php get_template_part('template-parts/hero/default', 'hero'); ?>

<section class="case-study">
    <div class="case-study__wrapper wrapper">
        <div class="case-study__content"><?php echo $content ?></div>
    </div>
</section>