<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-cards-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-cards';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$orderby = get_field('testimonial_card_gird_order');
$args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => -1,
    'orderby' => $orderby,
);

$query = new WP_Query($args);

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="testimonial-cards__container">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                $post = $query->post;
                $excerpt = get_field('testimonial_excerpt', $post->ID);
                $content = get_field('testimonial_content', $post->ID);
                $author = get_the_title($post->ID);
        ?>

                <div class="testimonial-cards__single">
                    <div class="inner">
                        <div class="quote"><?php echo get_template_part('assets/quote.svg') ?></div>
                        <p class="excerpt"><?php echo $excerpt ?></p>
                        <div class="content"><?php echo $content ?></div>
                        <h3 class="author"><?php echo $author ?></h3>
                    </div>
                </div>

        <?php endwhile;
        endif; ?>
    </div>
</section>

<?php wp_reset_query() ?>