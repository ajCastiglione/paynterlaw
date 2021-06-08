<?php

/**
 * Related Content Link - Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'related-content-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'related-content';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$see_text = get_field('related_content_text') ?: 'See also:';
$article = get_field('related_content_article');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="related-content__container">
        <span class="related-content__more"><?php echo $see_text ?></span>
        <a href="<?php echo get_permalink($article->ID) ?>" class="related-content__article"><?php echo $article->post_title ?></a>
    </div>
</section>