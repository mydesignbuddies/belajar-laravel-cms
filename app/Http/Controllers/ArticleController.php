<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;


class ArticleController extends Controller
{
    //INDEX
    public function index() {
        // database tanpa eloquent untuk menampilkan seluruh isi tabel guests
        // $guests = DB::table('guests')->get();

        // database dengan eloquent
        $categories = Category::all();
        $articles = Article::all();
        return view('addArticleForm', ['articles'=>$articles, 'categories'=>$categories]);
    }

    //STORE DATA
    public function store(Request $request) {
        $article = new Article;
        $article->title = $request->input('title');
        $article->article = $request->input('article');
        $article->category_id = $request->input('category_id');
        $article->save();

        return redirect('/')->with('message', 'Data is successfully saved');
    }

    // DESTROY
    public function destroy($id=0) {
       $article = Article::find($id);
       $article->delete();
       return redirect('/')->with('message','Data is successfully deleted');
   }

   //EDIT
   public function edit($id){
       $article = Article::find($id);
       $categories = Category::all();
        return view('addArticleForm', ['categories'=>$categories]);
       return redirect('/')->with('message','Data is successfully deleted');
   }

   //UPDATE
   public function update(Request $request,$id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->article = $request->input('article');
        $article->save($request->all());
        return redirect('/')->with('message', 'Data is successfully updated');
        //with adalah session yg akan dikirimkan
    }
}

