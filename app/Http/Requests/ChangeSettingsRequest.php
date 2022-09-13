<?php

namespace App\Http\Requests;

use App\Helpers\ApiFormatter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangeSettingsRequest extends FormRequest
{
  public function rules()
  {
      return [
          'key' => [
            'required',
            function($attribute, $value, $fail){
              if($value != "overtime_method"){
                $fail("Key cannot accept input except 'overtime_method'");
              }
            }
          ],
          'value' => 'required|exists:references,id',
      ];
  }

  public function failedValidation(Validator $validator)
  {
      throw new HttpResponseException(ApiFormatter::createApi(400, $validator->errors()));
  }
}
