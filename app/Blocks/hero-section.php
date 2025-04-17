<?php

namespace App;

add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name' => 'hero-section',
            'title' => __('Hero-Section', 'sage'),
            'description' => __('Ein Gutenberg-Block mit Flowbite-Klassen', 'sage'),
            'render_callback' => __NAMESPACE__ . '\\render_hero_section',
            'category' => 'flowbite-blocks',
            'icon' => 'slides',
            'keywords' => ['flowbite', 'tailwind', 'block'],
            'render_template' => \Roots\view('blocks.hero-section')->render(),
            'supports' => [
                'align' => true,
                'mode' => 'auto',
                'jsx' => true, // Erzwingt, dass der Block in Gutenberg auftaucht
            ],
        ]);
    }
});

function render_hero_section($block, $content = '', $is_preview = false, $post_id = 0)
{
    echo \Roots\view('blocks.hero-section', [
        'block' => $block,
        'is_preview' => $is_preview
    ]);
}
