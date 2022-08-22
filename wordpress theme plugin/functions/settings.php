<?php

if( !defined('ABSPATH') ) {
    exit;
}

if (!class_exists(' NEW_samer_theme')) {
    class NEW_samer_theme
    {   

        public function __construct()
        {
            add_action('admin_menu', array($this, 'NEW_samer_theme_settings_register'));
            add_action('admin_menu', array($this, 'NEW_samer_theme_settings_register2'));
        }

        public function NEW_samer_theme_settings_register()
        {
            add_options_page(__('samer theme settings'), __('samer theme settings'), 'manage_options', 'samer-theme-settings', 'NEW_EasyGDPR_settings_page');
        }

        public function NEW_samer_theme_settings_register2()
        {
            add_menu_page(__('samer theme settings'), __('samer theme settings'), 'manage_options', __('samer-theme-settings'), 'NEW_EasyGDPR_settings_page', 'dashicons-buddicons-groups');
        }
    }
    new  NEW_samer_theme();
}

if (!function_exists('NEW_EasyGDPR_settings_page')) {
    function NEW_EasyGDPR_settings_page()
    {
        include(plugin_dir_path(__DIR__) . 'html/settings-page.php');
    }
}








