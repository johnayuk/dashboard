<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
    {return [
        // "id"=>"required|exist:students.id",
        "name"=>"required",
        "last_name"=>"required",
        "condition"=>"required",
        "ward"=>"required",
        "doctor_id"=>"required",
        "phone"=>"required",
    ];
}

public function messages(){
    return [
        "name.required" => 'Name is required!',
        "last_name.required" => 'last_name is required!',
        "condition.required" => 'condition is required!',
        "ward.required" => 'ward is required!',
        "doctor_id.required" => 'doctor_id is required!',
        "phone.required" => 'phone is required!',
    ];
    }

    // 'name' => ['required', 'string',],
    // 'last_name' => ['required', 'string',],
    // 'condition' => ['required','string'],
    // 'ward' => ['required','string'],
    // 'doctor_id' => ['required'],
    // 'ward'=>['required','string', 'max:100'],
    // 'phone'=> ['required','string', 'max:100'],
}
