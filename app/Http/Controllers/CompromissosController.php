<?php

namespace App\Http\Controllers;

use App\Models\Compromisso;
use Illuminate\Http\Request;

class CompromissosController extends Controller
{
    public function index()
    {
        $compromissos = Compromisso::all();
        return view('compromissos/index', compact('compromissos'));
    }

    public function salvar(Request $request)
    {
        Compromisso::create($request->all());
        return redirect()->route('compromissos');
    }

    public function editar(Compromisso $compromisso, Request $request)
    {
        //Verifica se precisa gravar os dados
        if ($request->isMethod('PUT')) {
            $compromisso = Compromisso::find($request->id);
            $compromisso->fill($request->all());
            $compromisso->save();
            return redirect()->route('compromissos');
        }

        return view('compromissos.editar', compact('compromisso'));
    }

    public function apagar(Request $request)
    {
        $compromisso = Compromisso::findOrFail($request->id);
        $compromisso->delete();
        return redirect()->route('compromissos');
    }
}
