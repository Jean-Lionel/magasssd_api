<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionUpdateRequest extends FormRequest
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
            'montant' => ['required', 'numeric'],
            'montant_total' => ['required', 'numeric'],
            'tva' => ['numeric'],
            'description' => ['string'],
            'user_id' => ['integer', 'exists:users,id'],
            'stock_id' => ['integer', 'exists:stocks,id'],
            'softdeletes' => ['required'],
        ];
    }
}
