<?php

/**
 * Content w/ Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content-image-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-image';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$bg = get_field('background_color');
$title = get_field('content_media_title');
$content = get_field('content_media_text');
$desk_img = get_field('content_media_desktop_image');
$mob_img = get_field('content_media_mobile_image');
?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-bg="<?= $bg ?>">
    <section class="content-image__container wrapper">

        <div class="content-image__content">
            <h2 class="content-image__title"><?= $title ?></h2>
            <div class="content-image__text"><?= $content ?></div>
        </div>

        <div class="content-image__img">
            <img src="<?= $desk_img['url'] ?>" alt="<?= $desk_img['alt'] ?>" class="desk_img">
            <img src="<?= $mob_img['url'] ?>" alt="<?= $mob_img['alt'] ?>" class="mobile_img">
        </div>

    </section>
</article>