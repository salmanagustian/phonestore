<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $require = request()->method() == 'PUT' ? 'required' : 'nullable';

        return [
            'username' => 'sometimes|required',Rule::unique('users')->ignore($this->id),
            'fullname' => $require,
            'password' => 'nullable',
            'points'   => 'nullable',
            'roles'    => 'nullable',
        ];
    }
}
