<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculateEmiRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'principal'      => ['required', 'numeric', 'min:1000'],
            'annual_rate'    => ['required', 'numeric', 'between:0,50'],
            'tenure_months'  => ['required', 'integer', 'between:1,360'],
        ];
    }
     public function messages(): array
    {
        return [
            'principal.required'     => 'Loan amount is required.',
            'principal.numeric'      => 'Loan amount must be a number.',
            'principal.min'          => 'Loan amount must be at least 1,000.',
            'annual_rate.required'   => 'Annual interest rate is required.',
            'annual_rate.numeric'    => 'Annual interest rate must be a number.',
            'annual_rate.between'    => 'Annual interest rate must be between 0 and 50.',
            'tenure_months.required' => 'Tenure is required.',
            'tenure_months.integer'  => 'Tenure must be a whole number of months.',
            'tenure_months.between'  => 'Tenure must be between 1 and 360 months.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed.',
            'errors'  => $validator->errors(),
        ], 422));
    }
}
