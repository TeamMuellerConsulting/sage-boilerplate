<?php

namespace App;

add_action('acf/init', function () {
  acf_register_block_type([
    'name' => 'hero-section-cta',
    'title' => __('Hero-Section mit CTA', 'sage'),
    'description' => __('Ein Hero-Block mit zwei Call-to-Action Boxen.', 'sage'),
    'render_callback' => __NAMESPACE__ . '\\render_hero_section_cta',
    'category' => 'flowbite-blocks',
    'icon' => 'megaphone',
    'mode' => 'preview',
    'supports' => [
      'align' => true,
      'jsx' => true,
      'className' => true,
      'color' => [
        'background' => true,
        'text' => true,
      ]
    ],
  ]);
});

function render_hero_section_cta($block, $content = '', $is_preview = false, $post_id = 0)
{
  echo \Roots\view('blocks.hero-section-cta', [
    'block' => $block,
    'is_preview' => $is_preview,
    'post_id' => $post_id,
  ]);
}
