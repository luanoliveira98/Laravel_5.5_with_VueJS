<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'content', 'date'];

    protected $dates= ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
