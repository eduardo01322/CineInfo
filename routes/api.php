<?php

use App\Http\Controllers\filmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::post('filmes/cadastro', [filmeController::class, 'cadastroFilme']);
route::get('listagem', [filmeController::class, 'retornarTodos']);
route::get('filmes/pesquisar/titulo', [filmeController::class, 'pesquisarPorTitulo']);
route::get('filmes/pesquisar/diretor', [filmeController::class, 'pesquisarPorDiretor']);
route::get('filmes/pesquisar/genero', [filmeController::class, 'pesquisarPorGenero']);
route::delete('filmes/delete/{id}', [filmeController::class, 'excluir']);
route::put('filmes/update', [filmeController::class, 'update']);



