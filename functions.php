<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });


add_filter('font_awesome_skip_enqueue_kit', '__return_true');



add_action('wp_ajax_nopriv_ajax_contact_form', 'handle_ajax_contact_form');
add_action('wp_ajax_ajax_contact_form', 'handle_ajax_contact_form');

function handle_ajax_contact_form() {
    if (!empty($_POST['website'])) {
        wp_send_json_error('Spam erkannt.');
    }

    if (!isset($_POST['_ajax_nonce']) || !wp_verify_nonce($_POST['_ajax_nonce'], 'kontakt_form')) {
        wp_send_json_error('Ungültige Anfrage (Nonce ungültig).');
    }

    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        wp_send_json_error('Alle Felder sind Pflicht.');
    }

    $to = get_option('admin_email');
    $subject = 'Neue Kontaktanfrage (AJAX)';
    $body = "Name: $name\nE-Mail: $email\nNachricht:\n$message";

    $sent = wp_mail($to, $subject, $body);

    if ($sent) {
        wp_send_json_success();
    } else {
        wp_send_json_error('E-Mail-Versand fehlgeschlagen.');
    }
}
  