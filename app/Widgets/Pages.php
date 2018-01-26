<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Pages extends AbstractWidget
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
        $count = \App\Page::count();
        $string = 'Страничек';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-params',
            'title'  => "{$count} {$string}",
            'text'   => 'У Вас ' .$count. ' ' .Str::lower($string),
            'button' => [
                'text' => 'Странички',
                'link' => route('voyager.articles.index'),
            ],
            'image' => asset('/images/parts.jpg'),
        ]));
    }
}
