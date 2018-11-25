<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotesRequest extends FormRequest
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
            'customer_id'      => 'required',
            'partnumber'       => 'required',
            'process_id'       => 'required',
            'material'         => 'required',
            'method'           => 'required',
            'quantity_minimum' => 'min:1|max:2147483647|required|numeric',
            'quantity_maximum' => 'min:1|max:2147483647|nullable|numeric',
            'price'            => 'required',
            'units'            => 'required',
            //'mininum_lot_charge' => 'required',
            'quantity_price_break' => 'max:2147483647|nullable|numeric',
            'print'                => 'nullable|mimes:pdf',
        ];
    }
}
