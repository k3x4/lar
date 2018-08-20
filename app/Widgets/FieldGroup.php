<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class FieldGroup extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => '',
        'fieldGroups' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.field_group', [
            'config' => $this->config,
        ]);
    }
}
