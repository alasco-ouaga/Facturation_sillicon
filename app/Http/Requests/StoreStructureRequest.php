<?php

namespace App\Http\Requests;

use App\Models\Struture;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStructureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('struture_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
