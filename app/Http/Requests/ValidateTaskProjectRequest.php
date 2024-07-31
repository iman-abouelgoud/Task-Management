<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTaskProjectRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'project_id' => 'exists:projects,id'
            'project_id' => [

                function ($attribute, $value, $fail) {
                    $allowedValue = 0;

                    if ($value != $allowedValue && !\DB::table('projects')->where('id', $value)->exists()) {
                        $fail('The selected project id is invalid.');
                    }
                }
            ]
        ];
    }
}
