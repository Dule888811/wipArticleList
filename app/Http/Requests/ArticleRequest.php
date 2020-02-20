<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRequest extends FormRequest
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
            'title' => 'required|unique',
            'main_picture' => 'required|image',
            'blog' => 'required',
            'item_image[]' =>'image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required',
            'title.unique' => 'Title field already exist',
            'main_picture.required' => 'Main picture field is required',
            'main_picture.image' => 'Main picture not upload',
            'blog.required' => 'Blog field is required',
            'item_image[].image' => 'Item image picture not upload',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
