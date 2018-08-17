<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class FeatureGroup extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => '',
        'featureGroups' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.feature_group', [
            'config' => $this->config,
        ]);
    }
}
