<?php
$pre_title = get_field('hero_pre_title');
$title = get_field('hero_title');
$hero_content = get_field('hero_content');

$hero_form_pre_title = get_field('hero_form_pre_title');
$hero_form_title = get_field('hero_form_title');
?>

<section class="hero">
    <div class="hero__inner">
        <div class="hero__wrapper">
            <div class="hero__titles">
                <div class="hero__pretitle"><?php echo $pre_title ?></div>
                <div class="hero__title"><?php echo $title ?></div>
            </div>

            <div class="hero__content">
                <?php echo $hero_content ?>
            </div>
        </div>

        <div class="hero__form">
            <div class="inner-form">
                <h2 class="hero__form-pretitle"><?php echo $hero_form_pre_title ?></h2>

                <div class="hero__select-container">
                    <h1 class="hero__form-title"><?php echo $hero_form_title ?></h1>
                    <div class="inner-wrap">
                        <select class="hero__options">
                            <option value=""></option>
                            <?php if (have_rows('hero_options')) : while (have_rows('hero_options')) : the_row(); ?>
                                    <option value="<?php echo get_sub_field('link') ?>" class="hero__option"><?php echo get_sub_field('text') ?></option>
                            <?php endwhile;
                            endif; ?>
                        </select>
                        <div class="arrow"><?php get_template_part('assets/triangle', 'down.svg') ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>