<?php

namespace App\Http\Requests\CategoryApi;

use App\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryApiCreateRequest extends FormRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'is_publish' => 'boolean'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['is_publish' => $this->is_publish == 1 ? true : false]);
    }

    /**
     * Get the error messages for the defined validation rules.*
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        $formated = $this->setCode(400)
            ->setMessage($validator->errors()->first())
            ->setSuccess(false)
            ->setData($validator->errors())
            ->formatedJson();
        throw new HttpResponseException($formated);
    }
}
