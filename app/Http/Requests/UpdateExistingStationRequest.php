<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExistingStationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'logo' => ['nullable', 'image']
        ];
    }
}
