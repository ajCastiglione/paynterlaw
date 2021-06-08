<?php

$category = $wp_query->get_queried_object();
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'order' => "DESC",
    "orderby" => 'date',
    'cat' => $category->term_id
);

if (is_home()) {
    $query = new WP_Query($args);
} else {
    global $post;
}
wp_enqueue_style('blog-hero-style', get_template_directory_uri() . '/components/dist/blog-hero/blog-hero.css');

if (is_home() && $query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $post = $query->post;
        $feat_img = get_the_post_thumbnail_url($post->ID) ?: get_template_directory_uri() . '/assets/Default_Article_Image.jpg';
        $categories = count(get_the_category($post->ID)) > 3 ? array_slice(get_the_category($post->ID), 0, 3) : get_the_category($post->ID);
        $title = get_the_title($post->ID);
        $date = get_the_date('M d, Y', $post->ID);
?>
        <section class="hero">

            <div class="hero__grid wrapper">
                <a href="<?php echo get_permalink($post->ID) ?>" class="hero__img-container">
                    <img class="hero__img" src="<?php echo $feat_img ?>" alt="<?php echo get_the_title($post->ID) ?>">
                </a>
                <div class="hero__inner">
                    <a href="<?php echo get_permalink($post->ID) ?>">
                        <h1 class="hero__title"><?php echo $title; ?></h1>
                        <h3 class="hero__date"><?php echo $date; ?></h3>
                    </a>
                </div>
            </div>

        </section>

    <?php endwhile;


else :
    $feat_img = get_the_post_thumbnail_url($post->ID);
    $categories = count(get_the_category($post->ID)) > 3 ? array_slice(get_the_category($post->ID), 0, 3) : get_the_category($post->ID);
    $title = get_the_title($post->ID);
    $date = get_the_date('M d, Y', $post->ID);
    ?>
    <section class="hero <?php echo !$feat_img ? 'no-img' : ''; ?>">

        <div class="hero__grid wrapper">
            <div class="hero__img-container">
                <?php if ($feat_img) :  ?>
                    <img class="hero__img" src="<?php echo $feat_img ?>" alt="<?php echo get_the_title($post->ID) ?>">
                <?php endif; ?>
            </div>
            <div class="hero__inner">
                <h1 class="hero__title"><?php echo $title; ?></h1>
                <h3 class="hero__date"><?php echo $date; ?></h3>
            </div>
        </div>

    </section>

<?php endif;
wp_reset_query();
?>