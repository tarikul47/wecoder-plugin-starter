<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

class SettingsLinks
{
    protected $plugin;
    public function __construct()
    {
        $this->plugin = PLUGIN;
    }

    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
    }

    public function settings_link($links)
    {
        // add custom settings link 
        $settings_link = '<a href="admin.php?page=wecoder_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
