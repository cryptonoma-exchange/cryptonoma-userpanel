<?php

namespace App\Http\Requests;
 
use Lang;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Userprofile;
use Validator;

class ProfileRequest extends FormRequest
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
        $userprofile = Userprofile::where('user_id', Auth::id() )->first();       

        $rules = [
            'fname' => 'required|regex:/^[\pL\s\-]+$/u|between:6,25', 
            'lname' => 'required|regex:/^[\pL\s\-]+$/u|between:2,25', 
            'country' => 'required', 
        ];        

   
        Validator::extend('checkmobilenumber', function ($attribute, $value, $parameters, $validator) {                  
               if ( strlen(Input::get('mobile')) < 10 || strlen(Input::get('mobile')) > 15)
               {
                    return FALSE;
               }
               return TRUE;            
        });    
        $rules['mobile'] = 'required|numeric|checkmobilenumber';
       

        return $rules;
    }


}
