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

        $user = auth()->user();

        if($user->admin == "S"){
            return  DB::table('articles')
                    ->join('users','users.id','articles.user_id')
                    ->select('articles.id', 'articles.title', 'articles.description' ,'users.name', 'articles.date')
                    ->whereNull('deleted_at')
                    ->orderBy('articles.id', 'desc')
                    ->paginate($paginate); 
        }
            return  DB::table('articles')
                    ->join('users','users.id','articles.user_id')
                    ->select('articles.id', 'articles.title', 'articles.description' ,'users.name', 'articles.date')
                    ->whereNull('deleted_at')
                    ->where('articles.user_id', $user->id)
                    ->orderBy('articles.id', 'desc')
                    ->paginate($paginate); 
    }

    public static function listSite($paginate, $search = null){
        if($search){
            return  DB::table('articles')
                    ->join('users','users.id','articles.user_id')
                    ->select('articles.id', 'articles.title', 'articles.description' ,'users.name as author', 'articles.date')
                    ->whereNull('deleted_at')
                    ->whereDate('date', '<=', date('Y-m-d'))
                    ->where(function($query) use ($search){
                        $query->orWhere('title', 'like', '%'.$search.'%')
                              ->orWhere('description', 'like', '%'.$search.'%');
                    })
                    ->orderBy('date', 'desc')
                    ->paginate($paginate);
        } else {
            return  DB::table('articles')
                    ->join('users','users.id','articles.user_id')
                    ->select('articles.id', 'articles.title', 'articles.description' ,'users.name as author', 'articles.date')
                    ->whereNull('deleted_at')
                    ->whereDate('date', '<=', date('Y-m-d'))
                    ->orderBy('date', 'desc')
                    ->paginate($paginate);
        }    
    }
}
