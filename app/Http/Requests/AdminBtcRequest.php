<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Traits\AddressValidate;
use Illuminate\Support\Facades\Input;

class AdminBtcRequest extends FormRequest
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

    use AddressValidate;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        // dd(Input::get('todaddress'));
        Validator::extend('validateaddress', function ($attribute, $value, $parameters, $validator) {
           // dd(Input::get('todaddress'));

               $toAddress   = $this->protect(Input::get('todaddress'));

               $toAddress   = $this->validateBtc($toAddress);
               if ($toAddress == 'OK')
               {
                    return TRUE;
               }
               return FALSE;            
        }); 


        

        return [
            'amount' => 'required',
            'toaddress' => 'required|alpha_num',
        ];
    }


        /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {

        return [
            'amount.required' => 'Amount is required',
            'toaddress.required' => 'Toaddress is required',
            'toaddress.validateaddress' => 'Invalid BTC Address !!!',
            
        ];
    }
}
