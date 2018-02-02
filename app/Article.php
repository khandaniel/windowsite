<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    public function works()
    {
        return $this->belongsToMany('App\Work');
    }
}
