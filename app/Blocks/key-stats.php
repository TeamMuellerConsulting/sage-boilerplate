<?php

namespace App;

add_action('acf/init', function () {
    acf_add_local_field_group([
        'key' => 'group_key_stats',
        'title' => 'Key Stats – Einstellungen',
        'fields' => [
            [
                'key' => 'field_key_stats_title',
                'label' => 'Haupttitel',
                'name' => 'key_stats_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_key_stats_description',
                'label' => 'Beschreibung',
                'name' => 'key_stats_description',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'media_upload' => 0,
                'delay' => 1,
            ],
            [
                'key' => 'field_key_stats_items',
                'label' => 'Statistiken',
                'name' => 'stats',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Statistik hinzufügen',
                'sub_fields' => [
                    [
                        'key' => 'field_stat_value',
                        'label' => 'Wert',
                        'name' => 'value',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_stat_label',
                        'label' => 'Beschreibung',
                        'name' => 'label',
                        'type' => 'text',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/key-stats',
                ],
            ],
        ],
    ]);

    acf_register_block_type([
        'name' => 'key-stats',
        'title' => __('Key Stats', 'sage'),
        'render_callback' => __NAMESPACE__ . '\\render_key_stats',
        'category' => 'flowbite-blocks',
        'icon' => 'chart-bar',
        'keywords' => ['stats', 'zahlen', 'flowbite'],
        'supports' => [
            'align' => true,
            'mode' => 'auto',
            'jsx' => true,
            'className' => true,
            'color' => [
                'background' => true,
                'text' => true,
            ]
        ],

    ]);
});

function render_key_stats($block, $content = '', $is_preview = false, $post_id = 0)
{
    echo \Roots\view('blocks.key-stats', [
        'block' => $block,
        'is_preview' => $is_preview,
    ]);
}
