<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\Article;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Hash;


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

      /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/articles');
        }

        return $next($request);
    }

    public function showChangePasswordForm($id){
        $current_user = Auth::user();
        return view('articles.changepassword',compact('current_user'));
    }

    public function updatePassword(Request $request){
         if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("alert2","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed'
            // 'confirmpassword'   =>  'required|same:newpassword',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();
 
        return redirect()->back()->with("alert","Password changed successfully !");
 
    }
     


}
