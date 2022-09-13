<?php

namespace App\Http\Requests;

use App\Helpers\ApiFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreEmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|unique:Employees',
            'salary' => 'required|integer|min:2000000|max:10000000',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiFormatter::createApi(400, $validator->errors()));
    }
}
