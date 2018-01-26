<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Articles extends AbstractWidget
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
        $count = \App\Article::count();
        $string = 'Статей';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => 'У Вас ' .$count. ' ' .Str::lower($string),
            'button' => [
                'text' => 'Статьи',
                'link' => route('voyager.articles.index'),
            ],
            'image' => asset('/images/articles.jpg'),
        ]));
    }
}
