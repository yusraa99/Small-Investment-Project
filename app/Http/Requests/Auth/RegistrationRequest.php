<?php

namespace App\Http\Requests\Auth;

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
            'first_name'=> 'required|max:50',
            'last_name'=> 'required|max:50',
            'email'=> 'required|unique:users,email',
            'phone'=> 'sometimes|unique:users,phone|digits_between:10,20',
            'gender'=> 'sometimes|max:20',
            // 'birth_date',
            // 'image',
            // 'role',
            // 'status',
            'password'=>'required|min:6',
            // 'email_verified_at',
            // 'phone_verified_at',
        ];
    }
}
