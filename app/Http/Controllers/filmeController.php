<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmeFormRequest;
use App\Http\Requests\FilmeFormRequestUpdate;
use App\Models\Filme;
use Illuminate\Http\Request;

class filmeController extends Controller
{
    // Cadastro de filme
    public function cadastroFilme(FilmeFormRequest $request){
        $filme = Filme::create([
            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'sinopse' => $request->sinopse,
            'elenco' => $request->elenco,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'duracao' => $request->duracao,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $filme
        ], 200);
    }

    // Retornar todos
    public function retornarTodos(){
        $filme = Filme::all();
        return response()->json([
            'status' => true,
            'data' => $filme
        ]);
    }

    //Pesquisar por título/genero/diretor/sinopse
    public function pesquisa(Request $request)
{
    $query = Filme::query();

    $query->where(function ($q) use ($request) {
        $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
          ->orWhere('genero', 'like', '%' . $request->input('pesquisa') . '%');
    })
    ->where('titulo', 'like', '%' . $request->input('pesquisa') . '%');

    $filmes = $query->get();

    if (count($filmes) > 0) {
        return response()->json([
            'status' => true,
            'data' => $filmes
        ]);
    }

    return response()->json([
        'status' => false,
        'data' => "Nenhum resultado encontrado"
    ]);
}

    //Excluir
    public function excluir($id){
        $filme = Filme::find($id);
        if(!isset($filme)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
        $filme->delete();
    
        return response()->json([
            'status' => false,
            'message' => 'Programa excluido com sucesso'
        ]);
    }

    public function update(FilmeFormRequestUpdate $request){
        $filme = filme::find($request->id);
    
        if(!isset($filme)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
    
        if(isset($request->titulo)){
            $filme->titulo = $request->titulo;
        }

        if(isset($request->diretor)){
            $filme->diretor = $request->diretor;
        }
        
        if(isset($request->genero)){
            $filme->genero = $request->genero;
        }
        
        if(isset($request->dt_lancamento)){
            $filme->dt_lancamento = $request->dt_lancamento;
        }
        
        if(isset($request->sinopse)){
            $filme->sinopse = $request->sinopse;
        }
        
        if(isset($request->elenco)){
            $filme->elenco = $request->elenco;
        }
        
        if(isset($request->classificacao)){
            $filme->classificacao = $request->classificacao;
        }
        
        if(isset($request->plataforma)){
            $filme->plataforma = $request->plataforma;
        }

        if(isset($request->duracao)){
            $filme->duracao = $request->duracao;
        }

        $filme->update();
    
        return response()->json([
            "status" => false,
            "message" => "Programa atualizado"
        ]);
    }
}
