<?php

/**
 * Practice Area Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'practice-area-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'practice-area';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$meta = get_field('practice_area_meta_title');
$title = get_field('practice_area_title');
$view_all = get_field('practice_area_view_all_link');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="practice-area__container">
        <h3 class="practice-area__meta"><?= $meta ?></h3>
        <h2 class="practice-area__title"><?= $title ?></h2>

        <div class="practice-area__cards">
            <?php if (have_rows('practice_area_cards')) : while (have_rows('practice_area_cards')) : the_row();
                    $card_meta = get_sub_field('meta_title');
                    $card_title = get_sub_field('title');
                    $card_bg = get_sub_field('background_image');
                    $card_content = get_sub_field('content');
                    $card_cta_text = get_sub_field('cta_text');
                    $card_cta_link = get_sub_field('cta_link');
            ?>
                    <div class="practice-area__card">
                        <img src="<?= $card_bg ?>" alt="" class="card-bg">
                        <h3 class="card-meta-title"><?= $card_meta ?></h3>
                        <h2 class="card-title"><?= $card_title ?></h2>
                        <div class="card-content">
                            <?= $card_content ?: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.' ?>
                        </div>
                        <div class="card-cta">
                            <a href="<?= $card_cta_link ?>"><?= $card_cta_text ?: 'see more' ?> <span class="card-icon"><?= get_template_part('assets/arrow', 'right.svg') ?></span></a>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>

        <div class="practice-area__view-all">
            <a href="<?= $view_all ?>" class="btn">View All <?= get_template_part('assets/arrow', 'right.svg') ?></a>
        </div>

    </div>
</section>