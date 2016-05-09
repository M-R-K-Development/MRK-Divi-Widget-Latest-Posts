<?php
/*
 * Plugin Name: Latest Posts Divi Widget
 * Plugin URI: http://mrkdevelopment.com
 * Description: Addon for Divi Widget for Latest Posts.
 * Version: 1.0
 * Author: M R K Development
 * Author URI: http://mrkdevelopment.com
 * License: GPLv2 or later
 */
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $mrk_divi_custom_widgets_enabler;

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// DiviCustomWidget

/**
 * Defines variables for
 * @return [type] [description]
 */
function mrk_divi_widget_latest_posts()
{
    global $mrk_divi_custom_widgets_enabler;
    $files = glob(__DIR__.'/src/widgets/*');
    $mrk_divi_custom_widgets_enabler->addCustomWidgets(array(__DIR__ => $files));
}

add_filter('mrk_divi_widgets_load', 'mrk_divi_widget_latest_posts');

// Check if Divi Module is installed.
if (!function_exists('check_mrk_module_builder_present_for_lastest_posts')) {
    function admin_error_notice_mrk_custom_widget_absent_for_latest_post()
    {
        ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'Latest Posts Divi Widget requires MRK DIVI Builder Custom Widget
 active plugin.', 'sample-text-domain' );
        ?></p>
    </div>
    <?php

    }

    function check_mrk_module_builder_present_for_lastest_posts()
    {
        if (!class_exists('\\MRKDiviCustomWidgetsEnabler')) { // MRK Custom Widget plugin not installed.
            add_action( 'admin_notices', 'admin_error_notice_mrk_custom_widget_absent_for_latest_post' );
        }
    }
}

add_action('init', 'check_mrk_module_builder_present_for_lastest_posts');
