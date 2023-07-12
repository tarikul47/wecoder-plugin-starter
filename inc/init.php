<?php

/**
 * @package WecoderPlugin 
 */

namespace Inc;

final class Init
{
    /**
     * Store all the class inside an arry 
     * @return array Full list of class
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     * @return 
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {

            $service = self::instantiate($class);

            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class from the service array 
     * @return class instance new instance of class 
     */
    private static function instantiate($class)
    {
        $service = new $class();

        return $service;
    }
}
