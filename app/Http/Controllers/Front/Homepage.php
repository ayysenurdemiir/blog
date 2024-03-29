<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

//Models
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;

class Homepage extends Controller
{
    public function __construct(){
        view()->share('pages',Page::orderBy('order','ASC')->get());
        view()->share('categories',Category::all());
    }
    public function index()
    {
        $data['articles']= Article::orderBy('created_at','DESC')->paginate(2);
        $data['articles']->withPath(url('sayfa'));

        return view('front.homepage',$data);
    }

    public function single($category,$id)
    {
        $article= Article::where('id',$id)->first() ?? abort(403, 'ne yazdığına dikkat et');
        $article->increment('hit');
        $data['article']=$article;

        return view('front.single',$data);
    }


    public function category($id)
    {
        $category=Category::whereId($id)->first() ?? abort(403,'Böyle bir kategori bulunamadı');
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        return view('front.category',$data);
    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403,'Böyle bir sayfa bulunamadı.');
        $data['page']=$page;

        return view('front.page',$data);
    }
    public function contact(){
          return view ('front.contact');
    }

    public function contactpost(Request $request){

        $rules=[
             'name'=>'required|min:5',
             'email'=>'required|email',
             'topic'=>'required',
             'message'=>'required|min:10'
        ];
        $validate=Validator::make($request->post(),$rules);

          if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesajınız bize iletildi.Teşekkür ederiz!');
    }
}
