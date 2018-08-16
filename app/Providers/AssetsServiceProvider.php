<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // php artisan vendor:publish --tag=public --force

        // ADMIN LTE
        $this->publishes([
            base_path('node_modules') . '/admin-lte/dist' => public_path('adminlte/dist'),
        ], 'public');
        
        $this->publishes([
            base_path('node_modules') . '/admin-lte/bower_components' => public_path('adminlte/bower_components'),
        ], 'public');
        
        $this->publishes([
            base_path('node_modules') . '/admin-lte/plugins' => public_path('adminlte/plugins'),
        ], 'public');
        
        // JQUERY
        $this->publishes([
            base_path('node_modules') . '/jquery/dist/jquery.min.js' => public_path('js/lib/jquery/jquery.min.js'),
        ], 'public');
        
        // TINYMCE
        $this->publishes([
            base_path('node_modules') . '/tinymce' => public_path('js/lib/tinymce'),
        ], 'public');

        // DROPZONE
        $this->publishes([
            base_path('node_modules') . '/dropzone/dist' => public_path('js/lib/dropzone'),
        ], 'public');

        // CLIPBOARD
        $this->publishes([
            base_path('node_modules') . '/clipboard/dist' => public_path('js/lib/clipboard'),
        ], 'public');

        // BOOTSTRAP-SELECT
        $this->publishes([
            base_path('node_modules') . '/bootstrap-select/dist' => public_path('js/lib/bootstrap-select'),
        ], 'public');

        // FONT AWESOME
        $this->publishes([
            base_path('node_modules') . '/font-awesome/css' => public_path('css/lib/font-awesome/css'),
        ], 'public');
        $this->publishes([
            base_path('node_modules') . '/font-awesome/fonts' => public_path('css/lib/font-awesome/fonts'),
        ], 'public');

        // ICHECK-2
        $this->publishes([
            base_path('node_modules') . '/icheck-2' => public_path('js/lib/icheck-2'),
        ], 'public');

        // DATATABLES
        $this->publishes([
            base_path('node_modules') . '/datatables.net/js' => public_path('js/lib/datatables/js'),
        ], 'public');
        $this->publishes([
            base_path('node_modules') . '/datatables.net-bs/js' => public_path('js/lib/datatables/js'),
        ], 'public');
        $this->publishes([
            base_path('node_modules') . '/datatables.net-bs/css' => public_path('js/lib/datatables/css'),
        ], 'public');

        //PORTO HTML THEME
        $this->publishes([
            base_path('resources') . '/theme/vendor' => public_path('theme/vendor'),
        ], 'public');
        $this->publishes([
            base_path('resources') . '/theme/js' => public_path('theme/js'),
        ], 'public');
        $this->publishes([
            base_path('resources') . '/theme/fonts' => public_path('fonts'),
        ], 'public');
        $this->publishes([
            base_path('resources') . '/theme/skins/default.css' => public_path('theme/css/skins/default.css'),
        ], 'public');

        //IMAGES
        $this->publishes([
            base_path('resources') . '/assets/images' => public_path('images'),
        ], 'public');
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
