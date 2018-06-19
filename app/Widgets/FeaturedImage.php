<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class FeaturedImage extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'listing' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.featured_image', [
            'config' => $this->config,
        ]);
    }
}
