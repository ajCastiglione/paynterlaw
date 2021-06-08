<?php
// Single template for our-team members
$job = get_field('job_title');
$name = get_the_title();
$desc = get_field('brief_description');
$pic = get_the_post_thumbnail_url();
$experience = get_field('exp_body_content');
$accomplishments = get_field('acc_body_content');
$creds = get_field('cred_body_content');
$sidebar_title = get_field('sidebar_title');
$email = get_field('attorney_email');
$phone = get_field('attorney_phone');
$practice_areas = get_field('attorney_focus_areas');

?>

<article class="attorney">
    <header class="attorney__header wrapper">
        <div class="info">
            <h2 class="attorney__job-title"><?= $job ?></h2>
            <h1 class="attorney__name"><?= $name ?></h1>
        </div>

        <div class="attorney__desc"><?= $desc ?></div>

        <div class="image">
            <img src="<?= $pic ?>" alt="<?= $name ?>" class="attorney__headshot">
        </div>
    </header>

    <section class="attorney__tabs">
        <div class="wrapper">
            <span class="tab active" data-tab="experience">experience</span>
            <?php if (!empty($accomplishments)) : ?>
                <span class="tab" data-tab="accomplishments">accomplishments</span>
            <?php endif;
            if (!empty($creds)) : ?>
                <span class="tab" data-tab="credentials">credentials</span>
            <?php endif; ?>

            <div class="mobile-tabs-wrapper">
                <select class="mobile-tabs">
                    <option value="experience">experience</option>
                    <?php if (!empty($accomplishments)) : ?>
                        <option value="accomplishments">accomplishments</option>
                    <?php endif;
                    if (!empty($creds)) : ?>
                        <option value="credentials">credentials</option>
                    <?php endif; ?>
                </select>
                <div class="arrow">
                    <?php get_template_part('assets/down', 'arrow-sm.svg'); ?>
                </div>
            </div>

        </div>
    </section>

    <div class="attorney__grid wrapper">
        <section class="attorney__content">
            <div id="experience" class="tab-content active"><?= $experience ?></div>
            <div id="accomplishments" class="tab-content"><?= $accomplishments ?></div>
            <div id="credentials" class="tab-content"><?= $creds ?></div>
        </section>

        <aside class="attorney__sidebar">
            <h2 class="aside-title"><?= $sidebar_title ?></h2>
            <a href="mailto:<?= $email ?>" class="email"><?= $email ?></a>
            <a href="tel:<?= $phone ?>" class="phone"><?= $phone ?></a>

            <?php if (!empty($practice_areas)) : ?>
                <div class="attorney__focus">
                    <h2 class="focus-title">Focus Areas</h2>
                    <div class="focus-areas">
                        <?php foreach ($practice_areas as $area) : ?>
                            <a class="focus-areas-title" href="<?php echo get_permalink($area->ID) ?>">
                                <?php echo $area->post_title ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </aside>
    </div>

    <div class="quick-actions wrapper">
        <?php if (have_rows('quick_actions_cards', 'options')) : while (have_rows('quick_actions_cards', 'options')) : the_row();
                $link = get_sub_field('link');
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $hasLink = get_sub_field('has_link');
        ?>
                <div class="action">
                    <?php if ($hasLink) : ?> <a href="<?= $link ?>"> <?php endif; ?>
                        <h3 class="action-title"><?= $title ?></h3>
                        <div class="action-text"><?= $text ?></div>
                        <?php if ($hasLink) : ?>
                        </a> <?php endif; ?>
                </div>
        <?php endwhile;
        endif; ?>
    </div>

</article>