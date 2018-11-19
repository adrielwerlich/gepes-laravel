<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Manchetes extends Model
{
    //

    protected $fillable = ['titulo','descricao','link'];

    public function tema()
    {
        return $this->hasOne(TemaDaManchete::class);
    }

    public function saveManchete(Request $r)
    {
        // dd($r->all());

        $this->titulo = $r->campoTitulo;
        $this->descricao = $r->campoDescricao;
        $this->link = $r->campoLink;
        $this->temaId = $r->campoTema;

//        $data = $r->all();

//        dd($data, $this);

//        $data['imagemDaManchete'] = $this->nomeDaImagem;

        if ($r->hasFile('imagemDaManchete') && $r->file('imagemDaManchete')->isValid()) {
            if ($this->nomeDaImagem)
                $name = $this->nomeDaImagem;
            else
                $name = $this->id.microtime(false);

            $extension = $r->imagemDaManchete->extension();
            $nameFile = "{$name}.{$extension}";

//            dd($nameFile);

//            $data['imagemDaManchete'] = $nameFile;

            $upload = $r->imagemDaManchete->storeAs('manchetes', $nameFile);

//            dd($this, $upload);
            if (!$upload){
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }

            $this->nomeDaImagem = $nameFile;
        }



        $save = $this->save();
    //    dd($save,  $this);
        if ($save)
            return redirect()
                ->route('admin.mostrarManchetes')
                ->with('success', 'Cadastro de manchete realizado');

        return redirect()
            ->back()
            ->with('error', 'Falha no cadastro');
    }

    public function temaDaManchete()
    {
        // return $this->hasOne(Location::class);
        return $this->belongsTo(TemaDaManchete::class);
    }
}
