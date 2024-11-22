<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MlRequest extends FormRequest
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
            //'idML'=>'primary key'|'max:255',
            'matricule'=>'required'|'string'|'max:255',
            'typeml'=>'required'|'string'|'max:255',
            'capacite'=>'required'|'integer'|'max:255',

        ];
    }
}
