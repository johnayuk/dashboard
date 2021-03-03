<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdate extends FormRequest
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
            // "first_name"=>"required",
            // "last_name"=>"required",
            "specialization"=>"required",
            "department_id"=>"required",
        ];
    }

    public function messages(){
        return [
            // "first_name.required" => 'Name is required!',
            // "email.required" => 'email is required!',
            // "last_name.required" => 'last_name is required!',
            "specialization.required" => 'specialization is required!',
            "department_id.required" => 'department_id is required!',
          
        ];
    }
}
