<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Category;
use App\Http\Requests\StoreVideogame;
use App\Mail\VideogameMail;
use Illuminate\Support\Facades\Mail;

class GamesController extends Controller
{
    //
    public function index(){
        // return "Bienvenido a la web que listara los juegos comprados";
        // $videogames = array('Fifa22','NBA22','MarioKart','SuperMario');

        // $videogames = Videogame::all(); //Regresa una colección, que no tiene metodo 'orderBy'
        $videogames = Videogame::orderBy('id','desc')->get(); //Organiza los records en la busqueda, y los recupera con get
        // echo '<pre>';
        // print_r($videogames);
        // echo '</pre>';
        // dd($videogames);
        // return "testing env variable ".$_ENV['MAIL_USERNAME'];

        return view('index',[
            'games'=>$videogames
        ]);
    }
    public function create(){
        // return "Esta es la página donde se creará el formulario para dar de alta juegos, estamos utilizando un Controlador";

        $categories = Category::all();

        return view('create',[
            'categorias' => $categories
        ]);
    }
    public function help($name_game,$categoria=null){
        $date = Now();
        return view('show',[
            'nameVideogame'=>$name_game,
            'categoryGame'=>$categoria,
            'fecha'=>$date
        ]);

        // if($categoria)
        //     return "Bienvenido a la pagina del juego:".$name_game." que pertenece a la categoria:".$categoria;
        // else
        //     return "Bienvenido a la pagina del juego:" .$name_game;
    }

    public function storeVideogame(StoreVideogame $request){

    // public function storeVideogame(Request $request){
    //     $request->validate([
    //         'name_game'=>'required|min:5|max:10'
    //     ]);

        // $game = new Videogame;
        // $game->name = $request->name;
        // $game->category_id = $request->category_id;
        // // $game->name = $request->name_game;
        // // $game->category_id = $request->categoria_id;
        // $game->active = 1;
        // $game->save();

        // Videogame::create([
        //     'name' => $request->name,
        //     'category_id' => $request->category_id,
        // ]);

        Videogame::create($request->all());

        $mail_recipient = $_ENV['MAIL_USERNAME'];

        foreach ([$mail_recipient] as $recipient){
            Mail::to($recipient)->send(new VideogameMail());
        }

        return redirect()->route('games');

    }

    public function view($game_id){
        $game = Videogame::find($game_id);
        $categories = Category::all();

        return view('update',[
            'categorias' => $categories,
            'game' => $game
        ]);
    }

    public function updateVideogame(Request $request){

        $request->validate([
            'name_game'=>'required|min:5|max:10'
        ]);

        $game = Videogame::find($request->game_id);
        $game->name = $request->name_game;
        $game->category_id = $request->categoria_id;
        $game->active = 1;
        $game->save();

        return redirect()->route('games');

    }

    public function delete($game_id){
        $game = Videogame::find($game_id);
        $game->delete();
        return redirect()->route('games');
    }

}
