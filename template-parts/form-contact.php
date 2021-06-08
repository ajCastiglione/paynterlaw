<?php
$formID = get_field('contact_form_gravity_form_id', 'options');
$form = "[gravityform id={$formID} title=false description=false ajax=false]";
$meta = get_field('contact_form_meta_title', 'options');
$title = get_field('contact_form_title', 'options');
$phone = get_field('contact_form_phone', 'options');
$email = get_field('contact_form_email', 'options');
$form_title = get_field('contact_form_form_title', 'options');
wp_enqueue_style('contact-form-styles', get_template_directory_uri() . '/components/dist/form-contact/form-contact.css');

?>

<section class="contact-form gform_anchor">
    <div class="contact-form__container wrapper">
        <div class="contact-form__content">
            <div>
                <h3 class="contact-form__meta"><?= $meta ?></h3>
                <h2 class="contact-form__title"><?= $title ?></h2>
            </div>
            <div class="contact-form__info">
                <div class="contact-form__icon"><?= get_template_part('assets/phone', 'contact.svg') ?></div>
                <a class="contact-form__phone" href="tel:<?= $phone ?>"><?= $phone ?></a>
                <a class="contact-form__email" href="mailto:<?= $email ?>"><?= $email ?></a>
            </div>
        </div>
        <div class="contact-form__form">
            <h3 class="contact-form__form-title"><?= $form_title ?> <?= get_template_part('assets/arrow', 'down.svg') ?></h3>
            <?= do_shortcode($form) ?>
        </div>
    </div>
</section>