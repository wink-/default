<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscrepantMaterialsRequest extends FormRequest
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
            'quantity_rejected' => 'max:2147483647|nullable|numeric',
            'rejection_date' => 'nullable|date_format:'.config('app.date_format'),
            'corrective_action_due_date' => 'nullable|date_format:'.config('app.date_format'),
            'form' => 'nullable|mimes:pdf',
        ];
    }
}
