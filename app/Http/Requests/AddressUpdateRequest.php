<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'pays' => ['string', 'max:50'],
            'province' => ['string', 'max:50'],
            'commune' => ['string', 'max:50'],
            'zone' => ['string', 'max:50'],
            'colline' => ['string', 'max:50'],
            'user_id' => ['integer', 'exists:users,id'],
            'softdeletes' => ['required'],
        ];
    }
}
