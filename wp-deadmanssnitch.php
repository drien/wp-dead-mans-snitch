<?php
/**
 * Plugin Name: WP Dead Man's Snitch
 * Plugin URI: https://github.com/drien/wp-deadmanssnitch
 * Version: 0.1.0
 * Author: Adrien Delessert
 * Author URI: http://a.drien.com
 */

class Snitch {

    public $url;
    public $is_active;

    const hook_name = 'deadmans_snitch';

    static function get() {
        return new static();
    }

    function __construct() {
        $this->url = get_option('wpdms_url');
        $this->is_active = get_option('wpdms_is_active') === 'on' ? true : false;
    }

    function run() {
        wp_remote_get($this->url);
    }

    function activate() {
        if (wp_next_scheduled(static::hook_name)){
            return;
        }
        wp_schedule_event(time(), 'hourly', static::hook_name);
    }

    function deactivate() {
        wp_clear_scheduled_hook(static::hook_name);
    }
}

add_action(Snitch::hook_name, function() {
    $snitch = Snitch::get();
    $snitch->run();
});

register_deactivation_hook(__FILE__, function() {
    $snitch = new Snitch();
    $snitch->deactivate();
});

register_activation_hook(__FILE__, function() {
    $snitch = new Snitch();
    if (property_exists($snitch, 'is_active') && $snitch->is_active) {
        $snitch->activate();
    }
});

add_action('updated_option', function($option_name) {
    $wpdms_options = array('wpdms_url', 'wpdms_is_active');
    if (!in_array($option_name, $wpdms_options, true)) {
        return;
    }
    $snitch = new Snitch();
    if ($snitch->is_active) {
        $snitch->activate();
    } else {
        $snitch->deactivate();
    }
});

add_action('admin_menu', function() {
    add_submenu_page('options-general.php',
                     "Dead Man's Snitch",
                     "Dead Man's Snitch",
                     'manage_options',
                     'wpdms-settings',
                     function() {
                         require(__DIR__.'/admin-form.inc.php');
                     });
});

add_action('admin_init', function() {
    register_setting('deadmans-snitch-options', 'wpdms_url');
    register_setting('deadmans-snitch-options', 'wpdms_is_active');
});
