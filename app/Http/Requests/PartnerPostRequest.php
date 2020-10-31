<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'logo' => [
                'required|image',
            ],
            'contract' => [
                'required|mimes:pdf,doc,docx',
            ],
            'tel' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'web_link' => [
                'required',
            ],
        ];
    }
}
