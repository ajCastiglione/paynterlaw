<?php

/**
 * Featured Results Band Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-results-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-results';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('featured_results_title');
$content = get_field('featured_results_content');
$cta_text = get_field('featured_results_cta_text');
$cta_link = get_field('featured_results_cta_link');

?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <section class="featured-results__container">

        <span class="featured-results__line"></span>
        <div class="featured-results__content">
            <h2 class="featured-results__title"><?= $title ?></h2>
            <div class="featured-results__text"><?= $content ?></div>
        </div>

        <div class="featured-results__results">
            <?php if (have_rows('featured_results_results')) : while (have_rows('featured_results_results')) : the_row(); ?>
                    <div class="featured-results__result">
                        <h3 class="meta-title"><?= get_sub_field('title') ?></h3>
                        <p class="value"><?= get_sub_field('value') ?></p>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>

        <div class="featured-results__button">
            <a href="<?= $cta_link ?>" class=" btn"><?= $cta_text ?> <?= get_template_part('assets/arrow', 'right.svg') ?></a>
        </div>

    </section>
</article>