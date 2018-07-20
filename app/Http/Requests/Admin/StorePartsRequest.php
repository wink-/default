<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePartsRequest extends FormRequest
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
            'quality_check_1' => 'max:2147483647|nullable|numeric',
            'quality_check_2' => 'max:2147483647|nullable|numeric',
            'quality_check_3' => 'max:2147483647|nullable|numeric',
            'quality_check_4' => 'max:2147483647|nullable|numeric',
            'quality_check_5' => 'max:2147483647|nullable|numeric',
            'quality_check_6' => 'max:2147483647|nullable|numeric',
            'revision' => 'max:2147483647|nullable|numeric',
        ];
    }
}
