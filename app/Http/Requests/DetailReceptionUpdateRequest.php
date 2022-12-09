<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailReceptionUpdateRequest extends FormRequest
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
            'lot_id' => ['required', 'integer', 'exists:lots,id'],
            'user_id' => ['integer', 'exists:users,id'],
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'numeric'],
            'prix_unitaire' => ['required', 'numeric'],
            'reception_id' => ['required', 'integer', 'exists:receptions,id'],
            'softdeletes' => ['required'],
        ];
    }
}
