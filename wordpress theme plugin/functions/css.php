<?php

if( !defined('ABSPATH') ) {
    exit;
}

if (!function_exists('NEW_EasyGDPR_backend_css')) {
    function NEW_EasyGDPR_backend_css()
    {
        echo '<style>';
        include(plugin_dir_path(__DIR__) . '/html/css/backend.css');
        echo '</style>';
    }
    add_action('admin_head', 'NEW_EasyGDPR_backend_css');
}

if (!function_exists('NEW_EasyGDPR_frontend_css')) {
    function NEW_EasyGDPR_frontend_css()
    {
        wp_enqueue_style('NEW_EasyGDPR_frontend', plugin_dir_url(__DIR__) . '/html/css/gdpr-style.css');
    }
    add_action('wp_head', 'NEW_EasyGDPR_frontend_css');
}
