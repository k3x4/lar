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
        
        // JQUERY
        $this->publishes([
            base_path('node_modules') . '/jquery/dist/jquery.min.js' => public_path('assets/js/lib/jquery/jquery.min.js'),
        ], 'public');

        // DROPZONE
        $this->publishes([
            base_path('node_modules') . '/dropzone/dist' => public_path('assets/js/lib/dropzone'),
        ], 'public');

        // DATATABLES
        $this->publishes([
            base_path('node_modules') . '/datatables.net/js' => public_path('assets/js/lib/datatables/js'),
        ], 'public');
        // $this->publishes([
        //     base_path('node_modules') . '/datatables.net-bs/js' => public_path('assets/js/lib/datatables/js'),
        // ], 'public');
        // $this->publishes([
        //     base_path('node_modules') . '/datatables.net-bs/css' => public_path('assets/js/lib/datatables/css'),
        // ], 'public');

        // ICHECK-2
        $this->publishes([
            base_path('node_modules') . '/icheck-2' => public_path('assets/js/lib/icheck-2'),
        ], 'public');

        // METRONIC
        $this->publishes([
            base_path('resources') . '/assets/metronic/dist/demo7/assets' => public_path('assets/admin/theme'),
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
