<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status_id' => 'integer|nullable|between:1,4',
            'deadline_at' => 'date|nullable|date_format:Y-m-d',
            'deadline_after' => 'date|nullable|date_format:Y-m-d',
            'deadline_before' => 'date|nullable|date_format:Y-m-d'

        ];
    }
}
