<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{

    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'register';
    
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
            'name' => 'required|alpha_num|between:1,50',
            'surname' => 'required|alpha_num|between:1,50',
            'registration_email' => 'required|email|unique:users,email',
            'registration_password' => 'required|string|min:6|confirmed',
            'birthday' => 'required|date',
            'sex' => 'required|alpha|max:1'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Error: Firstname required',
            'name.alpha_num' => 'Error: Firstname must be alphanum',
            'name.between' => 'Error: Max 50 chars in firstname',
            'surname.required' => 'Error: Surname required',
            'surname.alpha_num' => 'Error: Surname must be alphanum',
            'surname.between' => 'Error: Surname must be 50 chars max',
            'registration_email.required' => 'Error: Email required',
            'registration_email.unique' => 'Error: User with email already registered',
            'registration_email.email' => 'Error: Invalid email',
            'registration_password.required' => 'Error: Password required',
            'registration_password.confirmed' => 'Error: Password and confirmation is not the same',
            'registration_password.min' => 'Error: Password min 6 chars',
            'birthday' => 'Error: Invalid birthday',
            'sex' => 'Error: Invalid gender'
        ];
    }
}
