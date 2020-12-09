<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NurseRequest extends FormRequest
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
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required|unique:users",
            "department_id"=>"required",
            "image"=>"mimes:jpeg,jpg,png,gif|required|max:10000",
        ];
    }


    public function messages(){
        return [
            "first_name.required" => 'Name is required!',
            "last_name.required" => 'last_name is required!',
            "email.required" => 'specialization is required!',
            "department_id.required" => 'department_id is required!',
            "image.required" => 'is required! and must be an image'
        ];
    }
}
