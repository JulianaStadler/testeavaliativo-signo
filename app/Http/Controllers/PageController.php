<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Resposta;
use Exception;

class PageController extends Controller
{

    public function index()
    {
        $enquetes = Enquete::all();

        $enquetesfinalizadas = [];
        $enquetesnaoiniciadas = [];
        $enquetesemandamento = [];

        $hoje = date('Y-m-d');
        foreach ($enquetes as $i => $enquete) {
            if ($enquete->dtFim < $hoje) {
                $enquetesfinalizadas[] = $enquete;
            } elseif ($enquete->dtInicio > $hoje) {
                $enquetesnaoiniciadas[] = $enquete;
            } else {
                $enquetesemandamento[] = $enquete;
            }
        }
        
        return view('/site/index', compact('enquetesemandamento', 'enquetesfinalizadas', 'enquetesnaoiniciadas'));
    }


    public function show($id)
    {
        $enquete = Enquete::find($id);
        $respostas = Resposta::where('enquete_id', $id)->orderBy('posicao')->get();
        $hoje = date('Y-m-d');
        $travada = false;
        if ($enquete->dtFim < $hoje) {
            $travada = true;
        } elseif ($enquete->dtInicio > $hoje) {
            $travada = true;
        }
        return view('/site/enquete', compact('enquete', 'respostas', 'travada'));
    }


    public function update(Request $request, $id, $idvoto)
    {
        try{
            $resposta = Resposta::findOrFail($idvoto);
            $resposta->votos = ($resposta->votos + 1);
            $resposta->save();

            $enquete = Enquete::findOrFail($id);
            $enquete->totalvotos = ($enquete->totalvotos + 1);
            $enquete->save();

            return redirect()->route('pages.show', ['id' => $id]);
        }catch(Exception $e){
            dd($e);
            return redirect()->route('pages.show', ['id' => $id]);
        }

    }

}
