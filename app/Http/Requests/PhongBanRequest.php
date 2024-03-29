<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhongBanRequest extends FormRequest
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
        return [
            'name'=>'unique:phongban,name',
        ];
    }
    public function messages()
    {
        return [
            'unique'=>'Phòng ban đã tồn tại',
        ];
    }
}
