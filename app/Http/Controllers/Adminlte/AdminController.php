<?php

namespace App\Http\Controllers\Adminlte;

use App\Models\Manchete;
use App\Models\TemaDaManchete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.home');
    }

    public function mostrarTemas()
    {
        $temas = TemaDaManchete::all();
        return view('admin.home.temas', compact('temas'));
    }

    public function cadastroDeTemas()
    {
        return view('admin.home.temas-cadastrar');
    }

    public function cadastrarTemas(Request $req)
    {

        $this->validate($req,[
            'temaAcadastrar' => 'required|string|max:191',
        ]);

        $res = TemaDaManchete::create([
            'tema' => $req['temaAcadastrar'],
        ]);

        if($res)
            return redirect()->route('admin.temas')
                ->with('success', 'tema cadastrado');

        return redirect()
            ->back()
            ->with('error', 'erro no cadastro do tema');

    }

    public function excluirTema()
    {
        //excluir manchetes
    }

    public function editarTema()
    {
        //excluir manchetes
    }



    public function mostrarManchetes()
    {
        $manchetes = Manchete::all();
        $manchetes->load('TemaDaManchete');
        $temas = TemaDaManchete::all();

        return view('admin.home.manchetes', compact('manchetes', 'temas'));
    }

    public function cadastroDeManchetes()
    {
        $temas = TemaDaManchete::all();
        return view('admin.home.manchetes-cadastro', compact('temas'));
    }

    public function cadastrarManchetes(Request $req)
    {


//        $m = Manchete::create([
//            'titulo' => $req['campoTitulo'],
//            'descricao' => $req['campoDescricao'],
//            'link' => $req['campoLink'],
//            'temaId' => $req['campoTema'],
//        ]);


        $this->validate($req,[
            'campoTitulo' => 'required|string|max:191',
            'campoDescricao'   => 'required|string',
        ]);


        $m_ =  new Manchete(); //$m->firstOrCreate([]);
        return $m_->saveManchete($req);


    }

    public function excluirManchetes()
    {
        //excluir manchetes
    }

    public function excluirManchete()
    {
        //excluir manchetes
    }

    public function editarManchete()
    {
        //excluir manchetes
    }

}
