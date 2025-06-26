<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Display the authentication page.
     *
     * @return \Illuminate\View\View
     */
    public function auth()
    {
        return view('pages.auth.connexion');
    }

    /**
     * Display the registration page.
     *
     * @return \Illuminate\View\View
     */
    public function inscription()
    {
        return view('pages.auth.inscription');
    }
}
