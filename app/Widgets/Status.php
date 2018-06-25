<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Status extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => '',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.status', [
            'config' => $this->config,
        ]);
    }
}
