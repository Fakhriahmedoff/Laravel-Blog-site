<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Category;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles=Article::orderby('id' ,'ASC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
       return view('back.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'title' =>'min:3',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:1000'
                ]);

            $article= new Article;
            $article->title = $request->title;
            $article->category_id = $request->category;
            $article->content= $request->content;
            $article->slug=Str::slug($request->title);
            $ext=$request->image->getClientOriginalExtension();
       

            if($request->hasFile('image')){
                $imageName= Str::slug($request->title).'.'.$ext;
                $request->image->move(public_path('uploads'),$imageName);
                $article->image='uploads/'.$imageName;

            }
            $article->save();
            toastr()->success('ugurlu','meqale ugurla yaradildi');
            return redirect()->route('meqaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $article=Article::findOrFail($id);
                                                                        


        $categories=Category::all();
        return view('back.articles.edit', compact('article','categories'));
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
        $request->validate([
            'title' =>'min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:1000'
            ]);

        $article=Article::findOrFail($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->content= $request->content;
        $article->slug=Str::slug($request->title);
    
   

        if($request->hasFile('image')){
            $ext=$request->image->getClientOriginalExtension();
            $imageName= Str::slug($request->title).'.'.$ext;
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;

        }
        $article->save();
        toastr()->success('ugurlu','meqale ugurla yenilendi');
        return redirect()->route('meqaleler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        Article::find($id)->delete();
        toastr()->success('meqale','meqale ugurla silindi');
        return redirect()->back();
    }

    public function destroy($id)
    {
     
    }
}
