<?php

add_filter('allowed_block_types', 'abt_allowed_block_types');

function abt_allowed_block_types($allowed_blocks)
{
    $block_types = WP_Block_Type_Registry::get_instance()->get_all_registered();
    $allowed_types = [
        'core/image',
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/quote'
    ];

    foreach ($block_types as $block) {
        if (strstr($block->name, 'acf')) {
            $allowed_types[] = $block->name;
        } elseif (strstr($block->name, 'gravityforms')) {
            $allowed_types[] = $block->name;
        }
    }

    return $allowed_types;
}
