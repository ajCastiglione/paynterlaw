<?php

/**
 * CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('cta_title');
$content = get_field('cta_content');
$cta_text = get_field('cta_text');
$cta_type = get_field('cta_type');
$cta_link = $cta_type == 'phone' ? get_field('cta_phone_number') : get_field('cta_link');
$style = get_field('cta_style');
?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-bg="<?= $style ?>">
    <section class="cta__container">
        <div class="cta__text">
            <h2 class="cta__title"><?= $title ?></h2>
            <div class="cta__content"><?= $content ?></div>
        </div>
        <div class="divider"></div>
        <div class="cta__btn">
            <?php if ($cta_type == 'phone') : ?>
                <a href="tel:<?= $cta_link ?>"><?= $cta_text ?></a>
            <?php else : ?>
                <a href="<?= $cta_link ?>"><?= $cta_text ?></a>
            <?php endif; ?>
        </div>
    </section>
</article>