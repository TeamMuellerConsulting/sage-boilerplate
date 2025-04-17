<?php

namespace App;

/**
 * Gibt Theme-Farben aus resources/colors.json zurück
 *
 * @param string $format raw|acf|tailwind
 */
function get_theme_colors(string $format = 'raw'): array
{
    $jsonPath = get_theme_file_path('resources/data/colors.json');

    if (!file_exists($jsonPath)) {
        return [];
    }

    $colors = json_decode(file_get_contents($jsonPath), true);

    if ($format === 'acf') {
        return collect($colors)->mapWithKeys(fn($item, $key) => [$key => $item['label']])->all();
    }

    if ($format === 'tailwind') {
        return collect($colors)->mapWithKeys(fn($item, $key) => [$key => $item['value']])->all();
    }

    return $colors;
}