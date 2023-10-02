<?php

namespace app\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customerId' => ['required'],
            'cost' => ['required', 'numeric'],
            'status' => ['required', Rule::in(['A', 'a', 'C', 'c', 'P', 'p'])],
            'billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
            'paidDate' => ['date_format:Y-m-d H:i:s', 'nullable']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
          'customer_id' => $this->customerId,
          'billed_date' => $this->billedDate,
          'paid_date' => $this->paidDate
        ]);
    }
}
