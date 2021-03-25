<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
class Homepage extends Controller
{
        public function __construct(){
            view()->share('pages',Page::orderBy('order','ASC')->get());
        } // bu funksiya gonderilen datani global formada butun controller funksiyalariniynan gonderen dumbeydir



    public function index(){
        $data['articles']=Article::orderBy('created_at','DESC')->paginate(2);
        $data['articles']->withPath('');
        $data['categories']=Category::get();

        return view('front.homepage', $data);
    }        

    public function single($category,$slug){
        $category=Category::where('slug',$category)->first() ?? abort(403, 'Bele bir kateqoriya yoxdu');
        $article=Article::where('slug',$slug)->whereCategory_id($category -> id)->first() ?? abort(403, 'Bele bir yazi yoxdu');
        $article->increment('hit');
        $data['article']=$article;
        $data['categories']=Category::get();
        $data['pages']=Page::orderBy('order','ASC')->get();
        return view('front.single', $data);
    }


    public function category($slug){
        $data['categories']=Category::get();
        $category =  Category::where('slug',$slug)->first() ?? abort(403, 'Bele bir kateqoriya yoxdu');
        $data['articles']=Article::where('category_id', $category->id)->orderBy('created_at','DESC')->paginate(2);
        $data['category']=$category;

            return view('Front.category',$data);
    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403, 'Bele bir seyfe yoxdu');
        $data['page']=$page;

        return view('Front.page',$data);
     }

     public function contact(){
         return view('Front.contact');
     }
     public function contactpost(Request $request){
         $contact = new Contact;
         $contact->name=$request->name;
         $contact->email=$request->email;
         $contact->topic=$request->topic;
         $contact->message=$request->message;
         $contact->save();
         return redirect()->route('contact')->with('success','Ugurla Gonderildi');
     }

}
