<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\Article;
use App\Comment;
use DB;


class UserController extends Controller
{
    //
    function profile(){
    	// return view('profile', array('user' => Auth::user()) );
    	$current_user = Auth::user();
        return view('profile', compact('current_user'));
    }

    function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
      		Image::make($avatar)->resize(300,300)->save( public_path('/uploads/' . $filename));

    		$current_user = Auth::user();
    		$current_user->avatar = $filename;
    		$current_user->save();
    	}

    	$current_user = Auth::user();
        return view('profile', compact('current_user'));
    }

    function listArticles(Request $request){
        $list_articles = Article::all();
        $preference = $request->session()->get('preference', 'default_preference');
        return view('home', compact('list_articles', 'preference'));
    }

    function showOneArticle($id){
      $article = Article::find($id);
      // return view('articles.articles_show_single_item',
      //  compact('article'));
      // $result = $article->comments();
      // $for_articles = $article->comments()->get();
      return view('showonearticle',compact('article'));
      
    }

    function postCommentUser(Request $request, $id){
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
      return back();

    }

        function getArticles(){
      $articles1 = DB::table('articles') -> where('id', 15) -> get();
      return view('home', compact('articles1'));
    }
     


}
