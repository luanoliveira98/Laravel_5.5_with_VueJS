<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'content', 'date'];

    protected $dates= ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function list($paginate){
        return  DB::table('articles')
                    ->join('users','users.id','articles.user_id')
                    ->select('articles.id', 'articles.title', 'articles.description' ,'users.name', 'articles.date')
                    ->whereNull('deleted_at')
                    ->paginate($paginate);        
    }
}
