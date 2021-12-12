<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'Integer',
        ];
    }

    public function messages()
    {
        return [
        ];
            
    }

    protected function failedValidation(Validator $validator)
{
    $response = [
        'status' => 'failure',
        'status_code' => 400,
        'message' => 'Bad Request',
        'errors' => $validator->errors(),
    ];

    throw new HttpResponseException(response()->json($response, 400));
}
    
}
