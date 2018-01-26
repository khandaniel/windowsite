<?php

namespace App\Widgets;

use App\Callback;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Callbacks extends AbstractWidget
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
        $count = \App\Callback::count();
        $string = 'Запросов на обратный звонок';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-telephone',
            'title'  => "{$count} {$string}",
            'text'   =>  'У Вас ' .Callback::where('processed', 'NO')->count(). ' необработанных ' .Str::lower($string),
            'button' => [
                'text' => 'Обратные звонки',
                'link' => route('voyager.callbacks.index'),
            ],
            'image' => asset('/images/callback.jpg'),
        ]));
    }
}
