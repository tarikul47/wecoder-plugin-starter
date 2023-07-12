<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/css/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL . '/assets/js/myscripts.js');
    }
}
