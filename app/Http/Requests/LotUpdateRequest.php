<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'numeric'],
            'price_unitaire' => ['required', 'numeric'],
            'price_vente' => ['required', 'numeric'],
            'date_created' => [''],
            'description' => ['required', 'string'],
            'softdeletes' => ['required'],
        ];
    }
}
