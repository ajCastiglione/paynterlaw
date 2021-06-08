<?php
$title = get_field('alert_title', 'options');
$content = get_field('alert_content', 'options');
$cta_text = get_field('alert_cta_text', 'options');
$cta_link = get_field('alert_cta_link', 'options');

wp_enqueue_style('alert styles', get_template_directory_uri() . '/components/dist/alert/alert.css')
?>

<section class="alert">
    <h3 class="alert__title"><?= $title ?></h3>
    <div class="alert__content"><?= $content ?></div>
    <?php if (!empty($cta_text)) : ?>
        <div class="alert__cta"><a href="<?= $cta_link ?>" class="btn"><?= $cta_text ?> <?= get_template_part('assets/arrow', 'right.svg') ?></a></div>
    <?php endif; ?>
</section>