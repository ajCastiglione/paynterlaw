<?php

$title = get_field('search_sidebar_title', 'options');
$content = get_field('search_sidebar_content', 'options');
$cta_text = get_field('search_sidebar_cta_text', 'options');
$cta_link = get_field('search_sidebar_cta_link', 'options');
?>

<section class="search__cta-container">
    <div class="search__cta-icon"><?php get_template_part('assets/question.svg') ?></div>
    <h2 class="search__cta-title"><?= $title ?></h2>
    <div class="search__cta-content"><?= $content ?></div>
    <a class="search__cta-btn" href="<?= $cta_link ?>"><?= $cta_text ?> <?php get_template_part('assets/arrow', 'right.svg') ?></a>
</section>