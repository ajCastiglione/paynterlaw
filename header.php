<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paynterlaw
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?php echo get_field('gtm_id', 'options') ?>');</script><!-- End Google Tag Manager -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_field('gtm_id', 'options') ?>"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->
    <a href="#main" class="skip-main" tabindex="1">Skip to main content</a>
    <div id="page" class="site">

        <?php if (get_field('show_alert', 'options')) : ?>
            <?php get_template_part('template-parts/content', 'alert') ?>
        <?php endif; ?>

        <header id="masthead" class="site-header <?php echo get_field("show_alert", 'options') ? 'alert-shown' : '' ?> " data-bg="<?php echo get_field('hero_background_color') ?>" <?php if(is_front_page()) { $bg = get_field('hero_background_image'); echo "style='background-image:url($bg)'";} ?>>

            <div class="site-branding">
                <?php if (is_front_page() || is_home()) : the_custom_logo();
                else : echo get_internal_logo();
                endif; ?>
                <div class="hamburger"><?php get_template_part('assets/menu.svg') ?></div>
            </div><!-- .site-branding -->

            <div class="menus">
                <div class="top-nav">
                    <!-- <a href="#" class="translate">En Español</a> -->
                    <div class="consultation">
                        <p>Free Consultation</p>
                        <a href="tel:<?php echo get_field('consultation_number', 'options') ?>"><?php echo get_field('consultation_number', 'options') ?></a>
                    </div>
                    <div id="nav-toggle" class="hamburger"><?php get_template_part('assets/menu.svg') ?></div>
                </div>
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    $walker = new Nav_Walker;
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'walker'         => $walker
                    ));
                    ?>
                </nav><!-- #site-navigation -->
                <nav id="mobile-nav" class="mobile-navigation">
                    <div class="mobile-top-nav">
                        <img class="mobile-logo" src="<?php echo get_field('logo_dark', 'options')['url'] ?>" alt="<?php echo get_field('logo_dark', 'options')['alt'] ?>">
                        <div class="consultation">
                            <p>Free Consultation</p>
                            <a href="tel:+(844) 851-8341">(844) 851-8341</a>
                        </div>
                        <div id="close-nav" class="close-btn"><?php get_template_part('assets/remove.svg') ?></div>
                    </div>

                    <?php get_template_part('template-parts/search', 'mobile') ?>

                    <?php
                    $mobile_walker = new Mobile_Nav_Walker;
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'mobile-menu',
                        'walker'         => $mobile_walker
                    ));
                    ?>
                </nav><!-- #mobile-nav -->
            </div>

            <?php get_template_part('template-parts/search', 'form') ?>

            <?php if (is_front_page()) get_template_part('template-parts/home', 'hero') ?>

        </header><!-- #masthead -->


        <div id="content" class="site-content">