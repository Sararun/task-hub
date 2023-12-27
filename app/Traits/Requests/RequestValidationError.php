<?php

namespace App\Traits\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait RequestValidationError
{
    /**
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'message' => 'Request data is incorrect.',
            'errors' => $validator->errors()
        ], 422);

        throw new HttpResponseException($response);
    }
}
