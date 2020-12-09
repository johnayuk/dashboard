<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            "name"=>"required",
            "email"=>"required",
            "time"=>"required",
            "service"=>"required",
        ];
    }

    public function messages(){
        return [
            "name.required" => 'Name is required!',
            "email.required" => 'email is required!',
            "time.required" => 'time is required!',
            "service.required" => 'service is required!',
        ];
    }
}

