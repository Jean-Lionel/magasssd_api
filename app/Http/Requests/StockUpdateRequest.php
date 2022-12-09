<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'date' => ['date'],
            'description' => ['string'],
            'type_id' => ['required', 'integer', 'exists:types,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'softdeletes' => ['required'],
        ];
    }
}