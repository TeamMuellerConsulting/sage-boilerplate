<?php

namespace App;

use function App\get_custom_css_variables;

add_action('acf/init', function () {
  // Feldgruppe registrieren
  acf_add_local_field_group([
    'key' => 'group_feature_list_icons',
    'title' => 'Feature List Icons – Einstellungen',
    'fields' => [
      [
        'key' => 'field_section_title',
        'label' => 'Titel',
        'name' => 'section_title',
        'type' => 'text',
        
      ],
      [
        'key' => 'field_section_description',
        'label' => 'Beschreibung',
        'name' => 'section_description',
        'type' => 'wysiwyg',
        'tabs' => 'visual',
        'media_upload' => 0, // optional: kein Medien-Upload
        'delay' => 1, // optional: WYSIWYG-Init verzögern für Performance
      ],
      [
        'key' => 'field_button_text',
        'label' => 'Button-Text',
        'name' => 'button_text',
        'type' => 'text',
        
      ],
      [
        'key' => 'field_button_url',
        'label' => 'Button-Link',
        'name' => 'button_url',
        'type' => 'url',
        
      ],
      [
        'key' => 'field_features',
        'label' => 'Features',
        'name' => 'features',
        'type' => 'repeater',
        'layout' => 'block',
        'button_label' => 'Feature hinzufügen',
        'sub_fields' => [
          [
            'key' => 'field_feature_icon',
            'label' => 'Icon-Klasse (Font Awesome)',
            'name' => 'icon',
            'type' => 'text',
            
          ],
          [
            'key' => 'field_feature_title',
            'label' => 'Feature-Titel',
            'name' => 'title',
            'type' => 'text',
            
          ],
          [
            'key' => 'field_feature_description',
            'label' => 'Beschreibung',
            'name' => 'description',
            'type' => 'textarea',
          ],
          [
            'key' => 'field_feature_button_text',
            'label' => 'Feature-Button-Text',
            'name' => 'feature_button_text',
            'type' => 'text',
            'wrapper' => ['width' => 50],
          ],
          [
            'key' => 'field_feature_button_link',
            'label' => 'Feature-Button-Link',
            'name' => 'feature_button_link',
            'type' => 'url',
            
          ],
        ],
      ],
    ],
    'location' => [
      [
        [
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/feature-list-icons',
        ],
      ],
    ],
  ]);

  // Block registrieren
  acf_register_block_type([
    'name' => 'feature-list-icons',
    'title' => __('Featureliste mit Icons', 'sage'),
    'render_callback' => __NAMESPACE__ . '\\render_feature_list_icons',
    'category' => 'flowbite-blocks',
    'icon' => 'feedback',
    'keywords' => ['flowbite', 'features', 'icons'],
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

// Render-Callback (sofern nicht schon global vorhanden)
function render_feature_list_icons($block, $content = '', $is_preview = false, $post_id = 0)
{
  echo \Roots\view('blocks.feature-list-icons', [
    'block' => $block,
    'is_preview' => $is_preview,
  ]);
}
