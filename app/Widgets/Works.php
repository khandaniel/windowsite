<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Works extends AbstractWidget
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
        $count = \App\Work::count();
        $string = 'Портфолио';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-treasure',
            'title'  => "{$count} {$string}",
            'text'   => 'У Вас в '.Str::lower($string). ' ' .$count. ' работ',
            'button' => [
                'text' => 'Портфолио',
                'link' => route('voyager.categories.index'),
            ],
            'image' => asset('/images/experience.jpg'),
        ]));
    }
}
