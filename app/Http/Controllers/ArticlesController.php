<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use Auth;
use App\Comment;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ArticlesController extends Controller
{
    //
    // function showArticles(){
    // 	$article1 = 'Tutorial';
    // 	$article2 = 'Getting started';
    // 	$this->insertArticles();
    // 	return view('articles.articles_list', compact('article1', 'article2'));
    // }

    // function showIftest(){
    // 	$var1 = 3;
    // 	$var2 = 5;
    // 	return view('iftest', compact('var1','var2'));
    // }

    // function insertArticles(){
    // 	DB::table('articles') -> insert(
    // 		['title' => 'How to be you po', 'content' => "Yes."]
    // 		);
    // }

    // function getArticles(){
    // 	$articles = DB::table('articles') -> where('id', 2) -> get();
    // 	return view('articles.articles_list', compact('articles'));
    // }

    // function updateArticles(){
    // 	DB::table('articles') -> where ('id',1) -> update(['title' => 'Oyeah']
    // 		);
    // }

    // delete
    // function deleteArticles(){
    // 	DB::table('articles') -> delete();
    // 	DB::table('articles') -> where('id',1) ->delete();
    // }
    // function showArticles(){
    // 	$all_articles = Article::all();
    // 	return view('articles.articles_list', compact('all_articles'));
    // }

    function show($id){
    	$article = Article::find($id);
      
      // $articles = Article::all();
    	// return view('articles.articles_show_single_item',
    	// 	compact('article'));
      // $result = $article->comments();
      // $related_comments = $article->comments()->get();
      return view('articles.articles_show_single_item',compact('article'));
    }

    function create(){
    	return view('articles.articles_create');
    }

   //  function store(Request $request){
   //  	$title = $request -> get('title');
   //  	$content = $request -> get('content');
   //    $author = Auth::user()->id;
   //  	$rules = array(
   //  		'title' => 'required | min:3 | max:100  | regex:/^[\pL\s\-]+$/u',
   //  		'content' => 'required '
   //  		);

   //  	$this->validate($request,$rules);
    	
   //  	$article_obj = new Article();
   //  	$article_obj -> title = $title;
   //  	$article_obj ->	content = $content;
   //    $article_obj -> author = $author;
   //  	$article_obj -> save();

   //  	// return view('articles.articles_create');
   //  	return redirect('articles')->with('alert', 'New Article Added!');
   //    // return back()->with('alert', 'Article Added!');
  	// }
function store(Request $request){
      $title = $request->title;
      $content = $request->content;
      $thumbnailImage = $request->file('image');
      //image going to the folder
      $file = $thumbnailImage;
      $namefile = $file->getClientOriginalExtension();
      $finalfilename = rand(123456,999999).".".$namefile;
      $destinationPath = public_path('/images');
      $file->move($destinationPath,$finalfilename);
      $rules = array(
        'title' => 'required | min:3 | max:50',
        'content' => 'required | min:3'
      );
      $this->validate($request,$rules);

      $article_obj = new Article();
      $article_obj->title = $title;
      $article_obj->content = $content;
      $article_obj->image = $finalfilename;
      $article_obj->save();

      return back()->with('alert', 'New Article Added!');
    }

    function update($id){
      $article = Article::find($id);
      // return view('articles.articles_show_single_item',
      //  compact('article'));
      // $result = $article->comments();
      // $for_articles = $article->comments()->get();
      return view('articles.update_article',compact('article'));
      
    }

      function updateArticles(Request $request, $id){
      $articles = Article::find($id);
      $articles->title = $request->title;
      $articles->content = $request->content;
      $articles->save();
      // return redirect('articles')->with('alert', 'Updated!');
      if(!is_null($request->file('image'))){
        $articles1 = Article::find($id);
        $articles = $request->file('image');
        
        $image_ext = $articles->getClientOriginalExtension();
        $new_image_name = rand(123456,999999).".".$image_ext;
        $destination_path = public_path('/images');
        $articles->move($destination_path, $new_image_name);
        $articles1->image = $new_image_name;
        $articles1->save();
      }

      return back()->with('alert', 'Updated!');
    }

  	function delete(Request $request, $id){
  		$article_to_delete = Article::find($id);
  		$article_to_delete -> delete();
  		// return "Item $id deleted";
  		// return redirect('articles');
  		return redirect('articles')->with('alert2', 'Deleted!');
  		// return redirect('articles')->with('message', 'Deleted');
  	}

  	function showArticles(Request $request){
  		$all_articles = Article::all();
  		$preference = $request->session()->get('preference', 'default_preference');
  		return view('articles.articles_list', compact('all_articles', 'preference'));
  	}

  	function setPreference(Request $request){
  		$preference = $request -> get('preference');
  		$request->session()-> put('preference', $preference);
  		return redirect("articles");
  	}

    function postComment(Request $request, $id){
      $comment = $request->description;
      $user_id = Auth::user()->id;
      $article_id = $id;
      // $article = Article::find($id)->title;
      // return ($comment . " to article " . $article_id . " is " . $comment . " by user " . $user_id);
      $comment_obj = new Comment();
      $comment_obj->user_id = $user_id;
      $comment_obj->article_id = $article_id;
      $comment_obj->description = $comment;
      $comment_obj->save();

      // return redirect("articles/$id")->with('alert', 'Comment Added.');
      return back()->with('alert', 'Comment Added!');

    }

    function deleteComment(Request $request, $id){
      $comment_to_delete = Comment::find($id);
      $comment_to_delete -> delete();
      // return "Item $id deleted";
      // return redirect('articles');
      return back()->with('alert2', 'Comment Deleted!');
      // return redirect('articles')->with('message', 'Deleted');
    }

    function index(Request $request){
        return view('uploadimg');
    }

    function imageupload(Request $request){
      if ($request->hasFile('image')){
        $title = $request->title;
        $image = $request->file('image');
        $image_ext = $image->getClientOriginalExtension();
        $new_image_name = rand(123456,999999).".".$image_ext;
        $destination_path = public_path('/images');
        $image->move($destination_path, $new_image_name);

        $articles = new Article;
        $articles->image = $new_image_name;
        $articles->save();
      } else {
        return back()->with('msg', 'Please choose any image file');
      }
    }

    function updateComment(Request $request, $id){
      $articles = Comment::find($id);
      $articles->description = $request->commentdescription;
      $articles->save();
      return back()->with('alert', 'Updated Comment');
    }

    
} 



