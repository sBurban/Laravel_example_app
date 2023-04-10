<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideogame extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|min:5|max:10',
            // 'name_game'=>'required|min:5|max:10',
        ];
    }

    //Puede cambiar los nombres de los atributos en los mensajes de error
    public function attributes(){
        return [
            'name' => 'videogame name',
            // 'name_game' => 'videogame name',
        ];
    }

    //Puede definir un mensaje especifico para ciertas validaciones
    public function messages(){
        return [
            'name.required' => 'El nombre del videojuego no puede estar vacio.'
            // 'name_game.required' => 'El nombre del videojuego no puede estar vacio.'
        ];
    }

}
