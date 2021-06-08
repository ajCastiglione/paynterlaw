<?php

/**
 * Quick Actions Band Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quick-actions-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quick-actions';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$bg = get_field('quick_actions_background_color') ?: '';
$rows = count(get_field('quick_actions_cards'));
switch ($rows) {
    case $rows == 2:
        $class = 'col-2';
        break;
    case $rows == 1:
        $class = 'col-1';
        break;
    default:
        $class = '';
        break;
}

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-bg="<?= $bg ?>">
    <div class="quick-actions__container wrapper">
        <div class="quick-actions__grid <?php echo $class; ?>">
            <?php if (have_rows('quick_actions_cards')) : while (have_rows('quick_actions_cards')) : the_row();
                    $hasLink = get_sub_field('has_link');
                    $link = get_sub_field('link');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
            ?>
                    <div class="action <?php echo $hasLink ? 'has-link' : 'no-link' ?>">
                        <?php if ($hasLink) : ?> <a href="<?= $link ?>"> <?php endif; ?>
                            <h3 class="action-title"><?= $title ?></h3>
                            <div class="action-text"><?= $text ?></div>
                            <?php if ($hasLink) : ?>
                            </a> <?php endif; ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>