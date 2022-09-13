<?php

namespace App\Http\Requests;

use App\Helpers\ApiFormatter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOvertimeRequest extends FormRequest
{
  public function rules()
  {
      return [
          'employee_id' => 'required|integer|exists:employees,id',
          'date' => 'required|date|date_format:Y-m-d',
          'time_started' => 'required|before_or_equal:time_ended|date_format:H:i',
          'time_ended' => 'required|after_or_equal:time_started|date_format:H:i'
      ];
  }

  public function failedValidation(Validator $validator)
  {
      throw new HttpResponseException(ApiFormatter::createApi(400, $validator->errors()));
  }
}
