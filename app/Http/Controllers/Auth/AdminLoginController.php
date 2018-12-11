<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the application’s login form.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
//        if(!session()->has('url.intended'))
//        {
//            session(['url.intended' => url()->previous()]);
//        }
        return view('auth.admin-login');
    }


    /**
     * @return mixed
     */
    protected function guard(){
        return Auth::guard('admin');
    }




}
