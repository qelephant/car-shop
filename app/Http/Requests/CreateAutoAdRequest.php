<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAutoAdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|max::20',
            'color' => 'required|string',
            'description' => 'required|string|max:255',
            'engine_volumne' => 'required|numeric|between:0,10',
            'city_id' => 'required|integer|exists:cities,id',
            'body_id' => 'required|integer|exists:bodies,id',
            'transmission_id' => 'required|integer|exists:transmissions,id',
            'wheel_id' => 'required|integer|exists:wheels,id',
            'drive_id' => 'required|integer|exists:drives,id'
        ];
    }
}
