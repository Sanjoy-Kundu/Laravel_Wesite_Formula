<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome(){
        return view('welcome');
    }

    function homePage(){
        return view('Frontend.home');
    }

    function categoryPage(){
        return view('Frontend.category');
    }
}
