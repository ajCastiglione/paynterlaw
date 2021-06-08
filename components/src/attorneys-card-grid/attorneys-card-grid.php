<?php

/**
 * Attorneys Card Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'attorneys-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'attorneys';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$meta = get_field('attorneys_card_grid_meta_title');
$title = get_field('attorneys_card_grid_title');
$count = get_field('number_of_members_to_show') ?: 6;
$args = array(
    'post_type' => 'our-team',
    'posts_per_page' => $count
);

$show_careers = get_field('show_careers_band');

$query = new WP_Query($args);

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="attorneys__container">
        <h2 class="attorneys__meta"><?php echo $meta ?></h2>
        <h1 class="attorneys__title"><?php echo $title ?></h1>

        <div class="attorneys__grid">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    $post = $query->post;
                    $headshot = get_the_post_thumbnail_url($post->ID) ?: get_template_directory_uri() . '/assets/default-attorney-img.jpg'; ?>
                    <div class="attorneys__card" style="background-image: url(<?php echo $headshot ?>)">
                        <a href="<?php echo get_permalink($post->ID) ?>" class="link">
                            <div class="info">
                                <?php if (!empty(get_field('job_title', $post->ID))) : ?>
                                    <h3 class="job-title"><?php echo get_field('job_title', $post->ID) ?></h3>
                                <?php endif; ?>
                                <h2 class="name">
                                    <?php echo get_the_title($post->ID) ?> <?php get_template_part('assets/arrow', 'right.svg') ?>
                                </h2>
                            </div>
                        </a>
                    </div>
            <?php endwhile;
            endif; ?>
            <?php if ($show_careers) :
                switch ($count) {
                    case $count % 3 === 0:
                        $class = 'col-3';
                        break;
                    case $count % 3 === 2:
                        $class = 'col-1';
                        break;
                    default:
                        $class = 'col-2';
                }
            ?>
                <div class="careers <?php echo $class ?>">
                    <?php $c_meta = get_field('careers_meta_title');
                    $c_title = get_field('careers_title');
                    $c_content = get_field('careers_content');
                    $c_img = get_field('careers_image'); ?>
                    <img src="<?php echo $c_img['url'] ?>" alt="<?php echo $c_img['alt'] ?>" class="careers__img">
                    <div class="careers__info">
                        <h3 class="careers__meta"><?php echo $c_meta ?></h3>
                        <h2 class="careers__title"><?php echo $c_title ?></h2>
                        <div class="careers__content"><?php echo $c_content ?></div>
                        <div class="careers__cta">
                            <?php if (have_rows('careers_ctas')) : while (have_rows('careers_ctas')) : the_row() ?>
                                    <a href="<?php echo get_sub_field('link') ?>" class="btn"><?php echo get_sub_field('text') ?></a>
                            <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>