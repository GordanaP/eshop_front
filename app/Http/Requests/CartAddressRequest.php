<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartAddressRequest extends FormRequest
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
            'billing.first_name' => 'required',
            'billing.last_name' => 'required',
            'billing.street_address' => 'required',
            'billing.postal_code' => 'required',
            'billing.city' => 'required',
            'billing.country' => 'required',
            'billing.phone' => 'required',
            'billing.email' => 'required|email',

            'shipping.first_name' => 'required_if:check_delivery,on',
            'shipping.last_name' => 'required_if:check_delivery,on',
            'shipping.street' => 'required_if:check_delivery,on',
            'shipping.postal_code' => 'required_if:check_delivery,on',
            'shipping.city' => 'required_if:check_delivery,on',
            'shipping.country' => 'required_if:check_delivery,on',
            'shipping.phone' => 'required_if:check_delivery,on',
            'shipping.email' => 'required_if:check_delivery,on',
        ];
    }
}
