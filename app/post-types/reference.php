<?php

namespace App;

add_action('init', function () {
    register_post_type('reference', [
        'labels' => [
            'name' => 'Referenzen',
            'singular_name' => 'Referenz',
            'add_new_item' => 'Neue Referenz hinzufügen',
            'edit_item' => 'Referenz bearbeiten',
            'new_item' => 'Neue Referenz',
            'view_item' => 'Referenz ansehen',
            'search_items' => 'Referenzen durchsuchen',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'referenzen'],
    ]);
});
