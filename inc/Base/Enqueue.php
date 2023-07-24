<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue'], 1000);
    }

    function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/css/mystyle.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/js/myscripts.js');
    }
}
