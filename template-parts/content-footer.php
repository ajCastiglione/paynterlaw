<?php
$offices_title = get_field('footer_content_offices_title', 'options');
$offices = get_field('footer_content_offices', 'options');
$contact_title = get_field('footer_content_contact_title', 'options');
$contact = get_field('footer_content_contact', 'options');
$disclaimer = get_field('footer_content_disclaimer_link', 'options') ?: '#';
$privacy = get_field('footer_content_privacy_policy_link', 'options') ?: '#';
wp_enqueue_style('content-footer', get_template_directory_uri() . '/components/dist/content-footer/content-footer.css');
wp_enqueue_script('content-footer-js', get_template_directory_uri() . '/components/dist/content-footer/content-footer.min.js');
?>

<section class="content-footer">
    <div class="content-footer__container wrapper">
        <div class="content-footer__offices">
            <h2 class="sect-title"><?= $offices_title ?></h2>
            <?= $offices ?>
        </div>
        <div class="content-footer__contact">
            <h2 class="sect-title"><?= $contact_title ?></h2>
            <?= $contact ?>
        </div>
        <div class="content-footer__scroll-top">
            <a href="#" id="scrollTop" class="scroll-btn flex"> <?= get_template_part('assets/scroll', 'up.svg') ?> back to top</a>
        </div>
        <div class="content-footer__notices">
            <a href="<?= $disclaimer ?>" class="link">Disclaimer</a>
            <span>|</span>
            <a href="<?= $privacy ?>" class="link">Privacy policy</a>
            <div class="abt-credit">
                <p>Website Designed & Developed by <a href="https://www.atlanticbt.com/">Atlantic BT</a></p>
            </div>
        </div>
    </div>
</section>