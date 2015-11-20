<?php
global $etheme_theme_data;
$etheme_theme_data = wp_get_theme( get_stylesheet_directory() . '/style.css' );
require_once( get_template_directory() . '/framework/init.php' );

    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

    add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );
    function wcqi_enqueue_polyfill() {
        wp_enqueue_script( 'wcqi-number-polyfill' );
    }