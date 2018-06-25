<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Category extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => '',
        'categories' => []
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.category', [
            'config' => $this->config,
        ]);
    }
}
