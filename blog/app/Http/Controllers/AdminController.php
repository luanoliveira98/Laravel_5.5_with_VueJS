<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Article;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCrumbs = json_encode([
            ["title"=>"Admin", "url"=>""]
        ]);
        $countTables = [
            "articles" => Article::count(), 
            "users"    => User::count(),
            "authors"  => User::where('author','S')->count(),
            "admins"  => User::where('admin','S')->count()
        ];

        return view('admin', compact('listCrumbs', 'countTables'));
    }
}
