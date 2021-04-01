<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorYController extends Controller
{
    //INDEX
    public function index() {
        // database tanpa eloquent untuk menampilkan seluruh isi tabel guests
        // $guests = DB::table('guests')->get();

        // database dengan eloquent
        $categories = Category::all();
        return view('addArticleForm', ['categories'=>$categories]);
    }

    // STORE DATA
    public function store(Request $request) {
        $category = new Category;
        $category->title = $request->input('title');
        
        $category->save();
        return redirect('/')->with('message', 'Data is successfully saved');
        //with adalah session yg akan dikirimkan
    }

    // DESTROY
    public function destroy($id=0) {
       $category = Category::find($id);
       $category->delete();
       return redirect('/')->with('message','Data is successfully deleted');
   }

    // INSERT
    public function edit($id) {
       $category = Category::find($id);
       return view('addArticleForm',['categories' => $category]);
       return redirect('/')->with('message','Data is successfully changed');
   }

    // UPDATE
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->title = $request->input('title');

        $category->save($request->all());
        return redirect('/')->with('message', 'Data is successfully updated');
        //with adalah session yg akan dikirimkan
    }
}
