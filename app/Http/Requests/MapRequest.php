<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapRequest extends FormRequest
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
            'title'  => 'required|unique:maps',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Das Brautpaar würde sich über eine nette Nachricht freuen :)',
            'lat.required' => 'Es muss ein Standort angegeben werden',
            'lng.required' => 'Es muss ein Standort angegeben werden'
        ];

    }
}
