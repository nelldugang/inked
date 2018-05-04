<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/articles';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        return 'username';
    }

  
    // function getArticles(){
    //  $articles = DB::table('articles') -> where('id', 2) -> get();
    //  return view('articles.articles_list', compact('articles'));
    // }

     public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if($user->username === 'admin') {
    //         return redirect()->intended('/articles'); // it will be according to your routes.

    //     } else {
    //         return redirect()->intended('/listArticles'); // it also be according to your need and routes
    //     }

    //     $value = $request->session()->get('username');
    // }

    
}
