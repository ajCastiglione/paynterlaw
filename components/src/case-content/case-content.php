<?php

/**
 *  Case content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'case-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'case';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

global $post;
$feat_img = get_the_post_thumbnail_url();
$mobile_feat_img = get_field('mobile_featured_image', $post->ID);
$meta = get_field('case_meta_title');
$title = get_field('case_title');
$content = get_field('case_content');
$show_callout = get_field('show_callout_card');
$callout_title = get_field('callout_title');
$callout_content = get_field('callout_content');

?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <section class="case__container">
        <?php if( $feat_img ) : ?>
            <picture>
                <source media="(max-width: 768px)" srcset="<?= $mobile_feat_img['url'] ?>">
                <source srcset="<?= $feat_img ?>">
                <img src="<?= $feat_img ?>" alt="<?= $mobile_feat_img['alt'] ?>" class="case__feat-img">
            </picture>
        <?php endif; ?>

        <div class="case__grid wrapper">
            <div class="case__sidebar"><?= get_template_part('template-parts/sidebars/sidebar', 'cases') ?></div>
            <div class="case__content">
                <h3 class="case__meta-title"><?= $meta ?></h3>
                <h2 class="case__title"><?= $title ?></h2>
                <?= $content ?>
                <?php if ($show_callout) : ?>
                    <div class="case__callout">
                        <h2 class="callout-title"><?php echo $callout_title ?></h2>
                        <div class="callout-content"><?php echo $callout_content ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</article>