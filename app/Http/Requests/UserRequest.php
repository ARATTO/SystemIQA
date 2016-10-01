<?php

namespace App\Http\Requests;

//use App\Http\Requests\;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'carnet' => 'min:6|max:20|required',
            'nombre' => 'min:3|max:120|required',
            'apellido' => 'min:3|max:120|required',
            'email' => 'min:5|max:100|required|unique:users',
            'password' => 'min:5|max:20|required',
            'foto' => 'image|mimes:jpeg,jpg,png | max:1000',
        ];
    }
}
