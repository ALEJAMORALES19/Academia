<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeDocenteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombres'=>'required|max:50',
            'apellidos'=>'required|max:40',
            'titulo'=>'required|max:50',
            'Edad'=>'required|numeric|digits_between:1,70',
            'fecha_contrato'=>'required',
            'foto'=>'required|max:60',
            'Doc_Identidad'=>'max:200','mimes:pdf,docx,doc',
        ];
    }
}
