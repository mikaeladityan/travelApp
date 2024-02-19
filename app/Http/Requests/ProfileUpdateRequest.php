<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['required', 'string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'idCard' => ['max:17', 'min:14', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['nullable'],
            'instagram' => ['nullable'],
            'tiktok' => ['nullable'],
            'street' => ['nullable'],
            'city' => ['nullable'],
            'province' => ['nullable'],
            'country' => ['nullable'],
            'postCode' => ['nullable'],
            'card' => ['nullable'],
            'actived' => ['nullable'],
            'born' => ['nullable'],
        ];
    }
}
