<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manchete;                                                   
use App\Models\TemaDaManchete;

class GepesController extends Controller
{
    public function index(){

        $manchetes = Manchete::all();
        $manchetes->load('TemaDaManchete');
        $temas = TemaDaManchete::all();

        return view('site.home.gepes_home',  compact('manchetes', 'temas'));
    }
}
