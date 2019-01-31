<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $id = $this->route('account');
        return [
            'name' => "required|max:50",
            'mobile' => 'max:50',
            'email' => 'string|email',
            'full_name' => 'required|max:50',
        ];
    }
}
