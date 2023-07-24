<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if (get_option('wecoder_plugin')) {
            return;
        }

        $default = array();

        update_option('wecoder_plugin', $default);
    }
}
