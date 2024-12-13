<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['login']);
    }

    public function index()
    {
        return view('layouts.app');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home'); // Se autenticado, vai para o dashboard
        }
        return redirect()->route('login'); // Se autenticado, vai para o dashboard
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
