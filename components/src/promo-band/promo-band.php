<?php

/**
 * Promo Band Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'promo-band-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'promo-band';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$bgimg = get_field('promo_band_background_image');
$meta = get_field('promo_band_meta_title');
$title = get_field('promo_band_title');
$content = get_field('promo_band_content');
$cta_text = get_field('promo_band_cta_text');
$cta_link = get_field('promo_band_cta_link');
$img = get_field('promo_band_main_image');
$mobileImg = get_field('promo_band_mobile_image');

?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <img src="<?= $bgimg['url'] ?>" alt="<?= $bgimg['alt'] ?>" class="promo-band__bgImg">
    <section class="promo-band__container">
        <div class="half">
            <h3 class="promo-band__meta"><?= $meta ?></h3>
            <h2 class="promo-band__title"><?= $title ?></h2>
        </div>
        <div class="half">
            <div class="promo-band__content"><?= $content ?></div>
            <div class="promo-band__cta"><a href="<?= $cta_link ?>" class="btn"><?= $cta_text ?></a></div>
        </div>
    </section>
    <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>" class="promo-band__image">
    <img src="<?= $mobileImg['url'] ?>" alt="<?= $mobileImg['alt'] ?>" class="promo-band__mobileImg">
</article>