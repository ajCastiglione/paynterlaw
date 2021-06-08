<?php

/**
 * Featured Content Band Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-content-band-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-content-band';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$meta = get_field('featured_content_band_meta_title');
$title = get_field('featured_content_band_title');
$content = get_field('featured_content_band_content');
$image = get_field('featured_content_band_image');
$mobile_image = get_field('featured_content_band_mobile_image');
$mobile_image = (get_field('featured_content_band_mobile_image')) ? get_field('featured_content_band_mobile_image') : get_field('featured_content_band_image');
?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <section class="featured-content-band__container">
        <div class="featured-content-band__text">
            <h3 class="featured-content-band__meta"><?php echo $meta ?></h3>
            <h2 class="featured-content-band__title"><?php echo $title ?></h2>
            <span class="line"></span>
            <div class="featured-content-band__content">
                <?php echo $content ?>
                <div class="featured-content-band__ctas">
                    <?php if (have_rows('featured_content_band_ctas')) : while (have_rows('featured_content_band_ctas')) : the_row(); ?>
                            <a href="<?php echo get_sub_field('cta_url') ?>" class="btn"><?php echo get_sub_field('cta_text') ?></a>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>

        </div>
        <div class="featured-content-band__img">
            <picture>
                <source srcset="<?php echo $image['url'] ?>" media="(min-width: 1025px)">
                <img src="<?php echo $mobile_image['url'] ?>" alt="<?php echo $image['alt'] ?>">
            </picture>
        </div>
    </section>
</article>