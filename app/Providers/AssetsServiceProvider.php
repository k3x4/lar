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
            base_path('vendor') . '/almasaeed2010/adminlte/dist' => public_path('adminlte/dist'),
        ], 'public');
        
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/bower_components' => public_path('adminlte/bower_components'),
        ], 'public');
        
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/plugins' => public_path('adminlte/plugins'),
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
