<?php

/**
 * Featured articles Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-articles-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-articles';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$meta = get_field('featured_articles_meta_title');
$title = get_field('featured_articles_title');
$cta_text = get_field('featured_articles_cta_text');
$cta_link = get_field('featured_articles_cta_link');
$cat_id = get_field('featured_articles_category') ?: null;
$num_posts = get_field('featured_articles_number_of_posts') ?: 3;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $num_posts,
    'orderby' => 'date'
);

$cat_id ? $args['cat'] = $cat_id : null;

$posts = new WP_Query($args);
?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <section class="featured-articles__container">

        <div class="featured-articles__titles">
            <h3 class="featured-articles__meta"><?= $meta ?></h3>
            <h2 class="featured-articles__title"><?= $title ?></h2>
        </div>

        <div class="featured-articles__cta">
            <a href="<?= $cta_link ?>" class="btn"><?= $cta_text ?> <?= get_template_part('assets/arrow', 'right.svg') ?></a>
        </div>

        <div class="featured-articles__posts">

            <?php if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); ?>
                    <?php $post_img = get_the_post_thumbnail_url($posts->post->ID, 'full') ?: get_template_directory_uri() . '/assets/Default_Article_Image.jpg'; ?>
                    <a href="<?= get_permalink() ?>" class="featured-article">
                        <img src="<?= $post_img ?>" alt="<?php echo the_title() ?>" class="featured-article__image">
                        <h3 class="featured-article__title"><?= the_title() ?></h3>
                        <date class="featured-article__date"><?= get_the_date('', $posts->post->ID) ?></date>
                    </a>
            <?php endwhile;
            endif; ?>

        </div>

    </section>
</article>