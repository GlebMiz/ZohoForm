<?php

namespace App\Http\Requests;

use App\Rules\AccountRule;
use App\Rules\StageRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DealRequest extends FormRequest
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
            'name' => 'required|string',
            'stage' => ['required', 'string', new StageRule],
            'account' => ['required', 'string', new AccountRule],
            'date' => 'required|date|before_or_equal:2099-12-31',
        ];
    }
}
