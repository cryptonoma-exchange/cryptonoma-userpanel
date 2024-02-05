<?php

namespace App\Http\Requests;
 
use Illuminate\Support\Facades\Input;

use Illuminate\Foundation\Http\FormRequest;

class AdminPasswordRequest extends FormRequest
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
           // dd('ddd');   
        return [
            'oldpassword' => 'required', 
            'newpassword' => 'required|min:6', 
            'confirmpassword' => 'required|min:6|same:newpassword'              
        ];
    }



}
