<?php

/**
 * Service Area Card Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'service-areas-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'service-areas';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$bgImg = get_field('service_area_card_grid_background_image')['url'];
$count = count(get_field('service_area_card_grid_services'));
$cta_special_text = get_field('cta_text');
$cta_special_link = get_field('cta_link');
$cta_special_meta = get_field('cta_meta_title');
$cta_special_title = get_field('cta_title');

?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <section class="service-areas__container" style="background-image: url(<?= $bgImg ?>)">
        <div class="service-areas__grid wrapper">

            <?php if (have_rows('service_area_card_grid_services')) : while (have_rows('service_area_card_grid_services')) :
                    the_row();
                    $service = get_sub_field("service_name");
                    $content = get_sub_field('body_content');
                    $cta_text = get_sub_field('cta_text');
                    $cta_link = get_sub_field('cta_link');
            ?>
                    <?php if (get_row_index() == ($count - 1)) : ?>
                        <div class="service-areas__service extra-cta-parent">
                            <div class="extra-cta">
                                <h3 class="cta-meta"><?= $cta_special_meta ?></h3>
                                <h2 class="cta-title"><?= $cta_special_title ?></h2>
                                <div class="cta-btn">
                                    <a href="<?= $cta_special_link ?>" class="btn"><?= $cta_special_text ?> <?= get_template_part('assets/arrow', 'right.svg') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="service-areas__service">
                        <span class="number">0<?= get_row_index() ?></span>
                        <h2 class="service-name"><?= $service ?></h2>
                        <div class="content"><?= $content ?></div>
                        <div class="service-cta">
                            <a href="<?= $cta_link ?>" class="btn"><?= $cta_text ?> <?= get_template_part('assets/arrow', 'right.svg') ?></a>
                        </div>
                    </div>

            <?php endwhile;
            endif; ?>

        </div>
    </section>
</article>