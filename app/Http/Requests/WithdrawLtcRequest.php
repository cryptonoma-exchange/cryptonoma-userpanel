<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Traits\AddressValidate;
use App\Traits\UserInfo;
use Illuminate\Support\Facades\Input;
use App\Commission;

class WithdrawLtcRequest extends FormRequest
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
        
        // // dd(Input::get('todaddress'));
        // Validator::extend('validateaddress', function ($attribute, $value, $parameters, $validator) {
        //    // dd(Input::get('todaddress'));

        //        $toAddress   = $this->protect(Input::get('todaddress'));

        //        $to_address = $EthereumValidator->isAddress($toAddress);

        //        //dd($toAddress);
        //        if ($toAddress == 'OK')
        //        {
        //             return TRUE;
        //        }
        //        return FALSE;            
        // }); 


        Validator::extend('checkbalance', function ($attribute, $value, $parameters, $validator) {

            $amount = Input::get('amount');
           // dd($amount);

            $ltcDeatils = Commission::where('source', 'LTC')->first();
           // dd($ethDeatils);
            $commission = ($ltcDeatils->withdraw / 100);



              $realbal = $this->getUserLtcBalance();  
             

              $amount1 = ($commission * $amount);
              $checkamt = $amount1 + $amount + 0.00084;
              if($realbal >= $checkamt)
              {
                return TRUE;

              }

              return FALSE;
           
        });   

        return [
            'amount' => 'required|min:0.00042',
            'toaddress' => 'required|checkbalance',
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
            'amount.checkbalance' => 'Insufficient Balance !!!',
            // 'toaddress.validateaddress' => 'Invalid BTC Address !!!',
            
        ];
    }
}
