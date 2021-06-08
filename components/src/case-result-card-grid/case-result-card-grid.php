<?php

/**
 * Case result cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'case-results-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'case-results';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$posts_per_page = get_field('number_of_cases') ?: 6;

$args = array(
    'post_type' => 'case-study',
    'posts_per_page' => $posts_per_page,
);

$query = new WP_Query($args);

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="case-results__container">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                $post = $query->post;
                $title = get_the_title($post->ID);
                $amt = get_field('notable_cases_amount', $post->ID);
                $excerpt = get_field('notable_cases_excerpt', $post->ID);
                $link = get_permalink($post->ID);
        ?>
                <div class="case-result">
                    <h2 class="case-result__amount"><?php echo $amt ?></h2>
                    <h3 class="case-result__title"><?php echo $title ?></h3>
                    <p class="case-result__excerpt"><?php echo $excerpt ?></p>
                    <a href="<?php echo $link ?>" class="case-result__cta btn">read case results <?php get_template_part('assets/arrow', 'right.svg') ?></a>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</section>