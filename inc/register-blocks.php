<?php
add_action('acf/init', 'my_acf_init');
function my_acf_init()
{
    // Check if function exists and hook into setup.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'featured-articles',
            'title'             => __('Featured Articles'),
            'description'       => __('Shows featured articles by selection.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'widgets',
            'icon'              => 'admin-post',
            'keywords'          => array('posts', 'blog posts', 'featured posts', 'featured articles'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/featured-articles/featured-articles.css",
            'enqueue_script'     => get_template_directory_uri() . "/components/dist/featured-articles/featured-articles.min.js",
        ));
        acf_register_block_type(array(
            'name'              => 'cta',
            'title'             => __('CTA'),
            'description'       => __('Displays a CTA.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'share-alt',
            'keywords'          => array('cta', 'cta block'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/cta/cta.css",
        ));
        acf_register_block_type(array(
            'name'              => 'practice-area',
            'title'             => __('Practice Area Cards'),
            'description'       => __('Shows practice areas in a grid of cards.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('practice area', 'area cards', 'cards'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/practice-area/practice-area.css",
            'enqueue_script'     => get_template_directory_uri() . "/components/dist/practice-area/practice-area.min.js",
        ));
        acf_register_block_type(array(
            'name'              => 'featured-content-band',
            'title'             => __('Featured Content Band'),
            'description'       => __('Featured content band.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('featured content', 'content band', 'band'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/featured-content-band/featured-content-band.css",
        ));
        acf_register_block_type(array(
            'name'              => 'featured-results-band',
            'title'             => __('Featured Results Band'),
            'description'       => __('Featured results band.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('featured results', 'results band', 'band'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/featured-results-band/featured-results-band.css",
        ));
        acf_register_block_type(array(
            'name'              => 'columned-highlight-band',
            'title'             => __('Columned Highlight Band'),
            'description'       => __('Columned highlight band.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('columned highlight', 'highlight band', 'band'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/columned-highlight-band/columned-highlight-band.css",
        ));
        acf_register_block_type(array(
            'name'              => 'steps-band',
            'title'             => __('Steps Band'),
            'description'       => __('Steps band.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('steps band', 'steps', 'band'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/steps-band/steps-band.css",
        ));
        acf_register_block_type(array(
            'name'              => 'promo-band',
            'title'             => __('Promo Band'),
            'description'       => __('Promo band.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('promo band', 'promo', 'band'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/promo-band/promo-band.css",
        ));
        acf_register_block_type(array(
            'name'              => 'testimonal',
            'title'             => __('Testimonial'),
            'description'       => __('Displays a single testimonial.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('testimonial', 'review'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/testimonal/testimonal.css",
        ));
        acf_register_block_type(array(
            'name'              => 'attorneys-card-grid',
            'title'             => __('Attorneys Card Grid'),
            'description'       => __('Displays team members in a grid.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'admin-page',
            'keywords'          => array('attorneys', 'team members'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/attorneys-card-grid/attorneys-card-grid.css",
        ));
        acf_register_block_type(array(
            'name'              => 'text-image',
            'title'             => __('Content & Media'),
            'description'       => __('Content on the left and media on the right.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('media', 'content', 'text'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/text-image/text-image.css",
        ));
        acf_register_block_type(array(
            'name'              => 'service-area-card-grid',
            'title'             => __('Service Area Card Grid'),
            'description'       => __('Service areas show-cased in a grid fashion.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('services', 'service areas'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/service-area-card-grid/service-area-card-grid.css",
        ));
        acf_register_block_type(array(
            'name'              => 'quick-actions-band',
            'title'             => __('Quick Actions Band'),
            'description'       => __('Will show quick actions.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('quick actions', 'actions'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/quick-actions-band/quick-actions-band.css",
        ));
        acf_register_block_type(array(
            'name'              => 'meta-heading',
            'title'             => __('Meta Heading'),
            'description'       => __('Meta title heading - best used before title.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('heading', 'meta heading'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/meta-heading/meta-heading.css",
        ));
        acf_register_block_type(array(
            'name'              => 'case-content',
            'title'             => __('Case Content'),
            'description'       => __('Content for the case single pages.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('case content', 'practice area content'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/case-content/case-content.css",
        ));
        acf_register_block_type(array(
            'name'              => 'featured-case-result',
            'title'             => __('Featured Case Result'),
            'description'       => __('Content, quick fact, and case result.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('featured case result', 'case result'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/featured-case-result/featured-case-result.css",
        ));
        acf_register_block_type(array(
            'name'              => 'related-content-link',
            'title'             => __('Related Content Link'),
            'description'       => __('Related Content Link.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('Related Content Link', 'Content Link'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/related-content-link/related-content-link.css",
        ));
        acf_register_block_type(array(
            'name'              => 'case-result-card-grid',
            'title'             => __('Case Result Card Grid'),
            'description'       => __('Case Result Card Grid.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('Case Result Grid', 'Case Result Card Grid'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/case-result-card-grid/case-result-card-grid.css",
        ));
        acf_register_block_type(array(
            'name'              => 'testimonials-card-grid',
            'title'             => __('Testimonials Card Grid'),
            'description'       => __('Grid of testimonials.'),
            'render_callback'   => 'acf_block_callback',
            'category'          => 'common',
            'icon'              => 'media-document',
            'keywords'          => array('Case Result Grid', 'Case Result Card Grid'),
            'enqueue_style'     => get_template_directory_uri() . "/components/dist/testimonials-card-grid/testimonials-card-grid.css",
            'enqueue_script'    => get_template_directory_uri() . '/components/dist/testimonials-card-grid/testimonials-card-grid.min.js'
        ));
    }
}

function acf_block_callback($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    // Name has to be equal to the file name after content
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "components/src" folder
    $path = get_template_directory() . "/components/src/{$slug}/{$slug}.php";
    if (file_exists($path)) {
        include($path);
    }
}
