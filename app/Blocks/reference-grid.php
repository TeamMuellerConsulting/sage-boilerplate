<?php

namespace App;

add_action('acf/init', function () {
    acf_register_block_type([
        'name' => 'reference-grid',
        'title' => __('Referenzübersicht', 'sage'),
        'category' => 'flowbite-blocks',
        'icon' => 'grid-view',
        'keywords' => ['referenz', 'projekte', 'grid'],
        'mode' => 'preview',
        'align' => 'full',
        'render_callback' => __NAMESPACE__ . '\\render_reference_grid',
        'supports' => [
            'align' => true,
            'mode' => true,
            'jsx' => true,
            'className' => true,
        ],
    ]);
});

function render_reference_grid($block, $content = '', $is_preview = false, $post_id = 0)
{
    echo \Roots\view('blocks.reference-grid', [
        'block' => $block,
        'is_preview' => $is_preview,
    ]);
}
