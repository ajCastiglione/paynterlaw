<?php

/**
 * Columned Highlight Band Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'columned-highlight-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'columned-highlight';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$meta = get_field('columned_highlight_meta_title');
$title = get_field('columned_highlight_title');
$bg = get_field('columned_highlight_background');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-bg="<?= $bg ?>">
    <div class="columned-highlight__container">
        <?php if (!empty($meta)) : ?>
            <h3 class="columned-highlight__meta"><?= $meta ?></h3>
        <?php endif; ?>
        <h2 class="columned-highlight__title"><?= $title ?></h2>
        <div class="columned-highlight__values <?php echo count(get_field('columned_highlight_values')) < 3 ? 'col-2' : null; ?>">
            <?php if (have_rows('columned_highlight_values')) : while (have_rows('columned_highlight_values')) : the_row(); ?>
                    <div class="value">
                        <img class="icon" src="<?= get_sub_field('icon')['url'] ?>" alt="icon-<?php echo get_sub_field('title') ?>">
                        <h3 class="title"><?= get_sub_field('title') ?></h3>
                        <div class="text"><?= get_sub_field('content') ?></div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>