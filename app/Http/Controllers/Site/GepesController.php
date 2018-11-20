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

        foreach($manchetes as $manchete)

            // $manchete->setTema($temas); todo - if controller logic get´s too big send create methods to model layer entity to handle this processing

          foreach($temas as $tema)
            if ($tema->id == $manchete->temaId) 
                $manchete->tema = $tema->tema; 
            
          
        // dd($manchetes);

        return view('site.home.gepes_home',  compact('manchetes'));
    }
}
