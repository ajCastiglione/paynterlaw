<?php

/**
 * Featured case result Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-case-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-case';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$meta = get_field('featured_case_meta_title');
$title = get_field('featured_case_title');
$content = get_field('featured_case_content');
$show_fact = get_field('show_quick_fact');
$fact_title = get_field('featured_case_fact_title');
$fact_content = get_field('featured_case_fact_content');
$fact_cta_text = get_field('featured_case_cta_text');
$fact_cta_link = get_field('featured_case_cta_link');
$case_bg = get_field('featured_case_case_background_image');
$case_meta = get_field('featured_case_case_meta_title');
$case_title = get_field('featured_case_case_title');
$case_content = get_field('featured_case_case_content');
$case_cta_text = get_field('featured_case_case_cta_text');
$case_cta_link = get_field('featured_case_case_cta_link');
$case_testimonials = get_field('featured_case_case_testimonial');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="featured-case__container">
        <div class="featured-case__grid <?php echo $show_fact ? '' : 'col-1' ?>">
            <div class="featured-case__content">
                <h3 class="featured-case__meta"><?php echo $meta ?></h3>
                <h2 class="featured-case__title"><?php echo $title ?></h2>
                <div class="featured-case__text"><?php echo $content ?></div>
            </div>
            <?php if ($show_fact) : ?>
                <div class="featured-case__fact">
                    <div class="inner">
                        <h2 class="fact-title"><?php echo $fact_title ?></h2>
                        <div class="fact-content"><?php echo $fact_content ?></div>
                        <div class="fact-cta">
                            <a href="<?php echo $fact_cta_link ?>" class="fact-btn btn"><?php echo $fact_cta_text ?> <?php get_template_part('assets/arrow', 'right.svg') ?></a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- Featured case here -->
        <div class="featured-case__case">
            <div class="result" style="background-image:url(<?php echo $case_bg['url'] ?>)">
                <h3 class="result-meta"><?php echo $case_meta ?></h3>
                <h2 class="result-title"><?php echo $case_title ?></h2>
                <div class="result-content"><?php echo $case_content ?></div>
                <a href="<?php echo $case_cta_link ?>" class="result-cta btn"><?php echo $case_cta_text ?> <?php echo get_template_part('assets/arrow', 'right.svg') ?></a>
            </div>
            <div class="featured-case-testimonial <?php echo count($case_testimonials) > 1 ? 'rows-2' : null ?>">
                <?php foreach ($case_testimonials as $testimonial) : ?>
                    <div class="featured-case-testimonial-inner">
                        <div class="featured-case-testimonial-quote"><?php echo get_template_part('assets/quote.svg') ?></div>
                        <div class="featured-case-testimonial-content"><?php echo get_field('testimonial_content', $testimonial->ID) ?></div>
                        <h2 class="featured-case-testimonial-author"><?php echo $testimonial->post_title ?></h2>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>