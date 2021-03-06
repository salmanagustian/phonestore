<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
        $require = request()->method() == 'PUT' || request()->method() == 'POST' ? 'required' : 'sometimes|required';

        return [
            'series'           => $require,
            'screen'           => $require,
            'memory'           => $require,
            'operation_system' => $require,
            'cpu'              => $require,
            'camera'           => $require,
            'sim'              => $require,
            'battery'          => $require,
            'points'           => $require.'|integer',
            'stock'            => $require.'|integer',
            'total_reviews'    => $require.'|integer',
        ];
    }
}
