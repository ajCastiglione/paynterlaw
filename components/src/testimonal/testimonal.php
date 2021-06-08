<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$testimonial = get_field('testimonial');
$testimonials_link = get_field('testimonials_page');

?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <section class="testimonial__container">
        <div class="testimonial__icon"><?= get_template_part('assets/quote.svg') ?></div>
        <div class="testimonial__single">
            <div class="testimonial__content"><?= get_field('testimonial_content', $testimonial->ID) ?></div>
            <h3 class="testimonial__author">– <?= $testimonial->post_title ?></h3>
        </div>
        <div class="testimonial__cta">
            <a href="<?= $testimonials_link ?>" class="btn">testimonials <?= get_template_part('assets/arrow', 'right.svg') ?></a>
        </div>
    </section>
</article>