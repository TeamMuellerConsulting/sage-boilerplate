<?php

namespace App;

add_action('init', function () {
    register_taxonomy('reference_category', ['reference'], [
        'labels' => [
            'name' => 'Referenz-Kategorien',
            'singular_name' => 'Referenz-Kategorie',
            'search_items' => 'Kategorien durchsuchen',
            'all_items' => 'Alle Kategorien',
            'edit_item' => 'Kategorie bearbeiten',
            'update_item' => 'Kategorie aktualisieren',
            'add_new_item' => 'Neue Kategorie hinzufügen',
            'new_item_name' => 'Neuer Kategoriename',
        ],
        'hierarchical' => false,
        'show_in_rest' => true,
        'public' => true,
        'rewrite' => ['slug' => 'referenz-kategorie'],
    ]);
});
