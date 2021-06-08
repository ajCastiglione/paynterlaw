<?php

/**
 * Steps Band Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'steps-band-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'steps-band';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$meta = get_field('steps_band_meta_title');
$title = get_field('steps_band_title');
$cta_text = get_field('steps_band_cta_text');
$cta_link = get_field('steps_band_cta_link');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="steps-band__container wrapper">
        <h3 class="steps-band__meta"><?= $meta ?></h3>
        <h2 class="steps-band__title"><?= $title ?></h2>
        <div class="steps-band__main">
            <div class="steps-band__values">
                <?php if (have_rows('steps_band_values')) : while (have_rows('steps_band_values')) : the_row();
                        $step = get_sub_field('step_number');
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                ?>
                        <div class="value">
                            <h4 class="step"><?= $step ?></h4>
                            <h3 class="title"><?= $title ?></h3>
                            <div class="content"><?= $content ?></div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
            <div class="steps-band__cta">
                <a href="<?= $cta_link ?>" class="btn"><?= $cta_text ?> <?= get_template_part('assets/arrow', 'right.svg') ?></a>
            </div>
        </div>
    </div>
</section>