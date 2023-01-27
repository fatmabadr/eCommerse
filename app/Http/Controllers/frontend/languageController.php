<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class languageController extends Controller
{
    public function English(){
        session()->get('language');
        session()->forget('language');
        session()->put('language', 'English');

    }
    //end of function
    public function Arabic(){
        session()->get('language');
        session()->forget('language');
        session()->put('language', 'Arabic');

    }
    //end of function
}
