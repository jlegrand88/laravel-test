<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreShippingRequest extends FormRequest
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
            'name' => 'required',
            'height' => 'required|numeric|max:200|min:1',
            'width' => 'required|numeric|max:200|min:1',
            'weight' => 'required|numeric|max:10|min:1',
            'destination' => ['required', 'numeric', Rule::in([1, 2])],
        ];
    }

    public function messages()
    {
        return [
            'height.max' => 'El campo Alto no debe ser mayor a 2 mt.',
            'width.max' => 'El campo Ancho no debe ser mayor a 2 mt.',
            'weight.max' => 'El campo Peso no debe ser mayor a 10 kg.',
            'height.min' => 'El campo Alto es obligatorio.',
            'width.min' => 'El campo Ancho es obligatorio.',
            'weight.min' => 'El campo Peso es obligatorio.',
        ];
    }
}
