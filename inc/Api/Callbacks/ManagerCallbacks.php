<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        $output = array();

        error_log(print_r($input, true));

        foreach ($this->managers as $key => $value) {
            $output[$key] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    public function adminSectionManager()
    {
        echo '<p>Manage The Sections and Features of This Plugin by activating the cheeckbox from the following list - From Section Callbacks.</p>';
    }

    public function checkboxField($args)
    {
        // echo '<pre>';
        //  print_r($args);
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        $isTrue = isset(get_option($option_name)[$name]) && get_option($option_name)[$name] ? true : false;
        $checkbox = $isTrue ? 'checked' : '';

        //  print_r($name_attr);
        // echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name[$name] . '" value="1" class="" ' . ($checkbox[$name] ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';

        $input = <<<EOD
        <div class="{$classes}">
            <input type="checkbox" id="{$name}" name="{$option_name}[$name]" value="1" {$checkbox}>
                <label for="{$name}">
                    <div></div>
                </label>
        </div>
EOD;
        echo $input;
    }
}
