<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Traits\AddressValidate;
use App\Traits\UserInfo;
use Illuminate\Support\Facades\Input;
use App\Commission;

class AdminEthRequest extends FormRequest
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

    use AddressValidate, UserInfo;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        Validator::extend('validateaddress', function ($attribute, $value, $parameters, $validator) {
           

               $toAddress   = $this->protect(Input::get('todaddress'));

               $to_address = $this->isAddress($toAddress);
               if ($toAddress == 'OK')
               {
                    return TRUE;
               }
               return FALSE;            
        }); 


        
        return [
            'amount' => 'required',
            'toaddress' => 'required|validateaddress',
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
            'toaddress.required' => 'Send address is required',
            'toaddress.validateaddress' => 'Invalid ETH Address!!!',
            
        ];
    }
}
