<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'profile';
    
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
            'password' => 'sometimes|string|min:6|confirmed',
            'birthday' => 'date',
            'phone' => 'numeric',
            'sex' => 'required|alpha|max:1',
            'bio' => 'between:0,250',
            'email' => 'required|exists:users,email'
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
            'password.confirmed' => 'Error: Passwords must be same',
            'password.min' => 'Error: Password must be >6 chars',
            'birthday' => 'Error: Invalid birthday',
            'phone' => 'Error: Invalid phone',
            'sex' => 'Error: Invalid gender',
            'bio.between' => 'Error: Bio max 250 chars',
            'email.required' => 'Error: Email required',
            'email.exists' => 'Error: Email must exist'
        ];
    }
}
