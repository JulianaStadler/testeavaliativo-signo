<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Resposta;
use Exception;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EnqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquetes = Enquete::all();
        return view('/admin/listarenquetes', compact('enquetes'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/novaenquete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacao dos campos
        $request->validate([
            'titulo'=> 'required',
            'dtInicio'=> 'required',
            'dtFim'=> 'required'
        ], [
            'required' => 'Preencha todos os campos'
        ]);

        DB::beginTransaction();
        try{
            $enq = Enquete::create([
                'titulo' => $request->titulo,
                'dtInicio' => Carbon::parse($request->dtInicio)->format('Y-m-d'),
                'dtFim' => Carbon::parse($request->dtFim)->format('Y-m-d'),
                'totalvotos' => 0
            ]);

            foreach($request->respostas as $indice => $resposta){
                $enq->respostas()->create(['titulo' => $resposta, 'posicao' => $indice, 'votos' => 0]);
            }

            DB::commit();
            return redirect()->route('enquete.index');
        }catch(Exception $e){
            dd($e);
            return redirect()->route('enquete.index');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enqueteatual = Enquete::find($id);
        $respostas = Resposta::where('enquete_id', $id)->orderBy('posicao')->get();
        return view('/admin/editarenquete', compact('enqueteatual', 'respostas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validacao dos campos
        $request->validate([
            'titulo'=> 'required',
            'dtInicio'=> 'required',
            'dtFim'=> 'required'
        ], [
            'required' => 'Preencha todos os campos'
        ]);

        try{
            $enquete = Enquete::findOrFail($id);

            $enquete->titulo = $request->titulo;
            $enquete->dtInicio = Carbon::parse($request->dtInicio)->format('Y-m-d');
            $enquete->dtFim = Carbon::parse($request->dtFim)->format('Y-m-d');

            $enquete->save();

            if(isset($request->aExcluir)){
                foreach ($request->aExcluir as $i => $excluir) {
                    $exc = Resposta::findOrFail($excluir);
                    $exc->delete();
                }
            }
            

            DB::beginTransaction();
            foreach ($request->respostas as $i => $resposta) {
                $resposta = Resposta::find($request->idbd[$i]);

                if ($resposta) {
                    $resposta->titulo = $request->respostas[$i];
                    $resposta->posicao = $i;
                    $resposta->save();
                } else {
                    $enquete->respostas()->create(['titulo' => $request->respostas[$i], 'posicao' => $i, 'votos' => 0]);
                }
            }
            DB::commit();

            return redirect()->route('enquete.index');
        }catch(Exception $e){
            dd($e);
            return redirect()->route('enquete.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resposta::where('enquete_id', $id)->delete();
        $enquete = Enquete::findOrFail($id);
        $enquete->delete();
    }
}
