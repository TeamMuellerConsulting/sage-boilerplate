<?php

namespace App;

add_action('acf/init', function () {
    acf_add_local_field_group([
        'key' => 'group_team_grid',
        'title' => 'Team Grid – Einstellungen',
        'fields' => [
            [
                'key' => 'field_team_grid_bg_color',
                'label' => 'Hintergrundfarbe',
                'name' => 'bg_color',
                'type' => 'select',
                
                'ui' => 1,
                'default_value' => 'white',
            ],
            [
                'key' => 'field_team_grid_title',
                'label' => 'Titel',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'key' => 'field_team_grid_description',
                'label' => 'Beschreibung',
                'name' => 'description',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'media_upload' => 0,
                'delay' => 1,
            ],
            [
                'key' => 'field_team_grid_members',
                'label' => 'Teammitglieder',
                'name' => 'team',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Mitglied hinzufügen',
                'sub_fields' => [
                    [
                        'key' => 'field_team_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_team_role',
                        'label' => 'Rolle',
                        'name' => 'role',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_team_image',
                        'label' => 'Foto',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                    ],
                    [
                        'key' => 'field_team_socials',
                        'label' => 'Social Links',
                        'name' => 'socials',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Social Link hinzufügen',
                        'sub_fields' => [
                            [
                                'key' => 'field_social_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'url',
                            ],
                            [
                                'key' => 'field_social_icon_class',
                                'label' => 'Icon-Klasse (z. B. fa-brands fa-twitter)',
                                'name' => 'icon_class',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_social_color_class',
                                'label' => 'Farbklasse (Tailwind z. B. text-[#39569c])',
                                'name' => 'color_class',
                                'type' => 'text',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/team-grid',
                ],
            ],
        ],
    ]);

    acf_register_block_type([
        'name' => 'team-grid',
        'title' => __('Team Grid', 'sage'),
        'render_callback' => __NAMESPACE__ . '\\render_team_grid',
        'category' => 'flowbite-blocks',
        'icon' => 'groups',
        'keywords' => ['team', 'mitarbeiter', 'flowbite'],
        'supports' => [
            'align' => true,
            'mode' => 'auto',
            'jsx' => true,
            'className' => true,
        ],
    ]);
});

function render_team_grid($block, $content = '', $is_preview = false, $post_id = 0)
{
    echo \Roots\view('blocks.team-grid', [
        'block' => $block,
        'is_preview' => $is_preview,
    ]);
}
