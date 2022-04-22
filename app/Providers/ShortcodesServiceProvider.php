<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $shortcode_classes = [];

        foreach(array_slice(scandir(app_path("Shortcodes")), 2) as $file){
            $shortcode_classes[] = "foduucrm\\Shortcodes\\".basename($file, '.php'); 
        }
        
        foreach($shortcode_classes as $class){
            foreach(get_class_methods($class) as $functionname){
                Shortcode::register($functionname, $class.'@'.$functionname);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
