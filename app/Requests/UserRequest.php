<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // "id"=>"required|exist:students.id",
            "name"=>"required",
            "phone"=>"required",
            "role"=>"required",
            "email"=>"required|unique:users",
            "image"=>"mimes:jpeg,jpg,png,gif|required|max:10000",
            "password"=>"required",
        ];
    }

    public function messages(){
        return [
            "name.required" => 'Name is required!',
            "phone.required" => 'Phone is required!',
            "role.required" => 'Role is required!',
            "email.required" => ' Email required!',
            "image.required" => 'image is required! and must be an image',
            "password.required" => 'Password is required! '
        ];
    }
}
