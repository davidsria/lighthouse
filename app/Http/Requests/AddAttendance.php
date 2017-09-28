<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAttendance extends FormRequest
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
            'location'=>'required',
            'date'=>'required',
            'start_time'=>'required',
            'duration'=>'required',
            'highlights'=>'required',
            'men'=>'required',
            'women'=>'required',
            'children'=>'required'
        ];
    }
}
