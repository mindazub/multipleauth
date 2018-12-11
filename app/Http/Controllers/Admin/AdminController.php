<?php
declare(strict_types = 1);


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.dashboard-v2');
    }

    /**
     * @return View
     */
    public function dashboard():View
    {
        return view('admin.dashboard');
    }
}
