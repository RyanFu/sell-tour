<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\Eloquent\UserRepositoryEloquent;
class AuthController extends Controller
{
    protected $usersrepo;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent  $user  the user repository
     * @param FoodRepositoryEloquent  $food  the food repository
     * @param ImageRepositoryEloquent $image the image repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->usersrepo = $user;
    }
    /**
     * Display view Login
     *
     * @return void
     */
    public function getLogin()
    {
        return view('backend.auth.login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
                'email'=>'required|email',
                'password'=>'required'
            ]);
        if (!Auth::attempt($request->only(['email','password']), $request->has('remember'))) {
            return redirect()->route('login')->with(trans('lang_admin.danger'), trans('lang_admin.error_login'));
        }
        return redirect()->route('admin.tour.index');

    }
    /**
     * Log out account
     *
     * @return void
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
