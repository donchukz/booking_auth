<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'full_name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/',
            'dob' => 'required|string',
            'username' => 'required|min:8|max:20|unique:users,username|regex:/^[a-zA-Z0-9Ññ\s]+$/',
            'email' => 'required|email|unique:users,email',
            'nationality' => 'required',
            'about' => 'nullable',
            'phone_number' => 'required|max:15|unique:users,phone_number',
            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                'confirmed'
            ],
        ];
    }
}
