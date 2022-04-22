<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class PartnerLoginRequest extends FormRequest
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
            'name' => 'required',
            'mobile' => 'required|min:10|max:12',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'adhar_no' => 'required',
            'pan_no'=> 'required'
        ];
    }
}
