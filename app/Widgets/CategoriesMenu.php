<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Category;
use App\Libraries\Category as CategoryTools;

class CategoriesMenu extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'categories' => [],
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeListSlugs($categories);
        $this->config['categories'] = $categories;

        return view('widgets.categories_menu', [
            'config' => $this->config,
        ]);
    }
}
