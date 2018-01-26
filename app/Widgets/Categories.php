<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Categories extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Category::count();
        $string = 'Виды работ';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-pie-chart',
            'title'  => "{$count} {$string}",
            'text'   => 'У Вас ' .$count. ' ' .Str::lower($string),
            'button' => [
                'text' => 'Виды услуг',
                'link' => route('voyager.categories.index'),
            ],
            'image' => asset('/images/categories.jpg'),
        ]));
    }
}
