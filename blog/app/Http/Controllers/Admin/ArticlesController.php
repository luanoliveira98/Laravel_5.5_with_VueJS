<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCrumbs = json_encode([
            ["title"=>"Home", "url"=>route('home')],
            ["title"=>"Articles List", "url"=>""]
        ]);

        $listModel = Article::select('id', 'title', 'description' ,'user_id', 'date')->paginate(10);
        return view('admin.articles.index', compact('listCrumbs', 'listModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        $validation = \Validator::make($data,[
            "title"         => "required",
            "description"   => "required",
            "content"       => "required",
            "date"          => "required"
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        Article::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validation = \Validator::make($data,[
            "title"         => "required",
            "description"   => "required",
            "content"       => "required",
            "date"          => "required"
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }

        
        Article::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back();
    }
}
