<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkordersRequest extends FormRequest
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

            'date_received'    => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'date_required'    => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'quantity'         => 'numeric',
            'quantity_shipped' => 'max:2147483647|nullable|numeric',
            'priority'         => 'max:2147483647|nullable|numeric',
        ];
    }
}
