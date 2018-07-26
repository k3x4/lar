<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ListingGallery extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'gallery'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.listing_gallery', [
            'config' => $this->config,
        ]);
    }
}
