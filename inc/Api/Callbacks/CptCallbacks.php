<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc\Api\Callbacks;

class CptCallbacks
{

    public function cptSectionManager()
    {
        echo '<p>Create as many Custom Post Types as you want!</p>';
    }


    public function cptSanitize($input)
    {
       // echo "<pre>";
       // print_r($input);
       // die();
        return $input;
    }

    public function textField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $input = get_option($option_name) ? get_option($option_name) : [];
        $value = isset($input[$name]) ? $input[$name] : '';

      //  var_dump($input);

        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '">';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }
}
