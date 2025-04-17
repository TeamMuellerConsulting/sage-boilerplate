<?php

namespace App;

add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name' => 'flowbite-test',
            'title' => __('Flowbite Block', 'sage'),
            'description' => __('Ein Gutenberg-Block mit Flowbite-Klassen', 'sage'),
            'render_callback' => __NAMESPACE__ . '\\render_flowbite_test',
            'category' => 'flowbite-blocks',
            'icon' => 'admin-generic',
            'keywords' => ['flowbite', 'tailwind', 'block'],
            // 'render_template' => \Roots\view('blocks.flowbite-test')->render(),
            'supports' => [
                'align' => true,
                'mode' => 'auto',
                'jsx' => true, // Erzwingt, dass der Block in Gutenberg auftaucht
                "customClassName" => true,
            ],
        ]);
    }
});

function render_flowbite_test($block, $content = '', $is_preview = false, $post_id = 0)
{
    echo \Roots\view('blocks.flowbite-test', [
        'block' => $block,
        'content' => $content,
        'is_preview' => $is_preview
    ])->render();
}
