<?php
global $post;
$title = $post->post_parent && get_post_type() !== 'cases' ? get_the_title($post->post_parent) : get_the_title($post->ID);
$subtitle = get_post_type() == 'case-study' ? get_field('notable_cases_amount') : get_field('subtitle');
$desc = get_post_type() == 'case-study' ? get_field('notable_cases_excerpt') : get_field('short_description');
$cta_text = get_field('cta_text');
$cta_link = get_field('cta_link');
$bg = get_field('hero_background_color');
// Enqueue styles/js
wp_enqueue_style('hero-style', get_template_directory_uri() . '/components/dist/default-hero/default-hero.css');

?>

<section class="hero" data-bg="<?php echo $bg; ?>">
    <div class="hero__inner wrapper">
        <div class="hero__titles">
            <h1 class="hero__pretitle"><?php echo $title ?></h1>
            <h2 class="hero__title"><?php echo $subtitle ?></h2>
        </div>

        <div class="hero__content">
            <div class="hero__text"><?php echo $desc ?></div>
            <?php if ($cta_text) : ?>
                <div class="hero__cta">
                    <a href="<?php echo $cta_link ?>" class="btn"><?php echo $cta_text ?> <?php echo get_template_part('assets/arrow', 'right.svg') ?></a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>