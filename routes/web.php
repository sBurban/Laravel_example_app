<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "Bienvenido al curso de Laravel 9 en El rincon de Isma";
});
Route::get('/games', [GamesController::class,'index'])->name('games');
Route::get('/games/create', [GamesController::class,'create'])->name('gamescreate');
Route::get('/games/{name_game}/{categoria?}',[GamesController::class,'help']);
Route::post('/games/storeVideogame', [GamesController::class,'storeVideogame'])->name('createVideogame');
Route::get('/view/{game_id}', [GamesController::class,'view'])->name('viewGame');
Route::post('/games/updateVideogame', [GamesController::class,'updateVideogame'])->name('updateVideogame');
Route::get('delete/{game_id}', [GamesController::class,'delete'])->name('deleteGame');


Route::resource('categories', CategoryController::class);

// Route::get('/games', function () {
//     return "Bienvenido a la web que listara los juegos comprados";
// });
// Route::get('/games/create', function () {
//     return "Esta es la página donde se creará el formulario para dar de alta juegos";
// });
// Route::get('/games/{name_game}', function ($name_game) {
//     return "Bienvenido a la pagina del juego:" .$name_game;
// });
// Route::get('/games/{name_game}/{categoria?}', function ($name_game,$categoria = null) {
//     if($categoria)
//         return "Bienvenido a la pagina del juego:".$name_game." que pertenece a la categoria:".$categoria;
//     else
//         return "Bienvenido a la pagina del juego:" .$name_game;
// });