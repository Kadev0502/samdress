<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'link'     => [
                'string',
                'nullable',
            ],
            'name'     => [
                'string',
                'nullable',
            ],
            'colors.*' => [
                'integer',
            ],
            'colors'   => [
                'array',
            ],
            'sizes.*'  => [
                'integer',
            ],
            'sizes'    => [
                'array',
            ],
        ];
    }
}
