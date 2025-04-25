<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);


/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

// this removes a unwanted redirect with the devserver on the wordpress homepage redirecting to the non devserver URL
if (getenv('WP_ENV') === 'development') {
    remove_action('template_redirect', 'redirect_canonical');
}
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('sage/editor-styles', asset('styles/app.css')->uri(), false, null);
    wp_enqueue_script('flowbite-js', asset('scripts/app.js')->uri(), [], null, true);
});
require_once __DIR__ . '/helpers.php';

require_once 'Blocks/flowbite-test.php';
require_once 'Blocks/hero-section.php';
require_once 'Blocks/feature-list-icons.php';
require_once 'Blocks/hero-section-cta.php';
require_once 'Blocks/key-stats.php';
require_once 'Blocks/team-grid.php';

//add Categorie to Gutenberg-Editor for Flowbite-Blocks
add_filter('block_categories_all', function ($categories) {
    // Neue Flowbite-Kategorie erstellen
    $flowbite_category = [
        'slug'  => 'flowbite-blocks',
        'title' => __('Flowbite Blöcke', 'sage'),
        'icon'  => 'layout'
    ];

    // Flowbite-Kategorie als ERSTE Kategorie im Array setzen
    array_unshift($categories, $flowbite_category);

    return $categories;
}, 10, 2);

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('theme-variables', asset('styles/variables.css')->uri(), false, null);
}, 100);
