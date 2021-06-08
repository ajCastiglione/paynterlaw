<?php
/**
 * Background block
**/
$bg_option = get_field( 'bg_option' );
$full_bleed = get_field( 'full_bleed' ) == 1 ? true : false;
$image = get_field( 'image' );
$video = get_field( 'video' );
$video_poster = get_field( 'video_poster' );
$alignment = get_field( 'alignment' );
$title = get_field( 'title' );
$subtitle = get_field( 'subtitle' );
$content = get_field( 'content' );
?>
<?php if ($bg_option && $full_bleed) : ?>
<div class="band background" style="background-image: url(<?= esc_url($image['url']); ?>)">
    <div class="band__wrapper background__wrapper <?= $alignment; ?>">
<?php else : ?>
<div class="band background">
    <div class="band__wrapper background__wrapper <?= $alignment; ?>" style="background-image: url(<?= esc_url($image['url']); ?>)">
<?php endif; ?>
        <?php if (!$bg_option && !$full_bleed) : ?>
        <div class="background__video">
            <video loop autoplay muted playsinline poster="<?= esc_url($video_poster['url']); ?>">
                <source src="<?= $video; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <?php endif; ?>

        <?php if ($content || $title || $subtitle) : ?>
            <div class="background__content">
                <?php if ($title) : ?>
                    <h2 class="background__title"><?= $title; ?></h2>
                <?php endif; ?>
                <?php if ($subtitle) : ?>
                    <h3 class="background__subtitle"><?= $subtitle; ?></h3>
                <?php endif; ?>
                <?php if ($content) : ?>
                    <div class="background__description"><?= $content; ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!$bg_option && $full_bleed) : ?>
        <div class="background__video">
            <video loop autoplay muted playsinline poster="<?= esc_url($video_poster['url']); ?>">
                <source src="<?= $video; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    <?php endif; ?>
</div>