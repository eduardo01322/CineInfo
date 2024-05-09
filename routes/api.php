<?php

use App\Http\Controllers\filmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::post('filmes/cadastro', [filmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodos']);
route::get('filmes/pesquisa', [filmeController::class, 'pesquisa']);
route::delete('filmes/delete/{id}', [filmeController::class, 'excluir']);
route::put('filmes/update', [filmeController::class, 'update']);



