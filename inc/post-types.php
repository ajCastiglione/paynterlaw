<?php

define('TESTDOMAIN', 'post-types');
define('TESTPATH', get_template_directory() . '/inc/post-types.php');

function regsiter_testimonial_type()
{
    $labels = array(
        'name' => __('Testimonials', TESTDOMAIN),
        'singular_name' => __('Testimonial', TESTDOMAIN),
        'archives' => __('Testimonials Directory', TESTDOMAIN),
        'add_new' => __('Add New Testimonial', TESTDOMAIN),
        'add_new_item' => __('Add New Testimonial', TESTDOMAIN)
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'rewrite' => array('with_front' => false),
        'publicly_queryable' => false,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'revisions')
    );

    register_post_type('testimonial', $args);
}

add_action('init', 'regsiter_testimonial_type');

// Team members post type
define('TEAMDOMAIN', 'post-types');
define('TEAMPATH', get_template_directory() . '/inc/post-types.php');

function regsiter_team_type()
{
    $labels = array(
        'name' => __('Team Members', TEAMDOMAIN),
        'singular_name' => __('Team Member', TEAMDOMAIN),
        'archives' => __('Team Members Directory', TEAMDOMAIN),
        'add_new' => __('Add New Team Member', TEAMDOMAIN),
        'add_new_item' => __('Add New Team Member', TEAMDOMAIN)
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'rewrite' => array('with_front' => false),
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail', 'revisions')
    );

    register_post_type('our-team', $args);
}

add_action('init', 'regsiter_team_type');


// Team members post type
define('CASESDOMAIN', 'post-types');
define('CASESPATH', get_template_directory() . '/inc/post-types.php');

function regsiter_cases_type()
{
    $labels = array(
        'name' => __('Practice Areas', CASESDOMAIN),
        'singular_name' => __('Practice Area', CASESDOMAIN),
        'archives' => __('Practice Areas', CASESDOMAIN),
        'add_new' => __('Add New Practice Area', CASESDOMAIN),
        'add_new_item' => __('Add New Practice Area', CASESDOMAIN)
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'rewrite' => array('with_front' => false),
        'menu_icon' => 'dashicons-portfolio',
        'hierarchical' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes')
    );

    register_post_type('cases', $args);
}

add_action('init', 'regsiter_cases_type');

// Team members post type
define('RESULTSDOMAIN', 'post-types');
define('RESULTSPATH', get_template_directory() . '/inc/post-types.php');

function regsiter_results_type()
{
    $labels = array(
        'name' => __('Notable Cases', RESULTSDOMAIN),
        'singular_name' => __('Notable Case', RESULTSDOMAIN),
        'archives' => __('Notable Cases', RESULTSDOMAIN),
        'add_new' => __('Add New Case', RESULTSDOMAIN),
        'add_new_item' => __('Add New Case', RESULTSDOMAIN)
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'rewrite' => array(
            'slug' => '/results/case-study',
            'with_front' => false
        ),
        'menu_icon' => 'dashicons-index-card',
        'supports' => array('title', 'revisions')
    );

    register_post_type('case-study', $args);
}

add_action('init', 'regsiter_results_type');
