<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $nicknameUniqueStr  =   'unique:admins,nickname,' . request('id') . ',id,deleted_at,NULL';
        $accountUniqueStr   =   'unique:admins,account,' . request('id') . ',id,deleted_at,NULL';

        $rules = [
            'nickname'  =>      'required|string|min:3|max:20|' . $nicknameUniqueStr,
            'account'   =>      'required|string|min:6|max:30|' . $accountUniqueStr,
            'password'  =>      'required|string|min:6|max:30|confirmed',
            // 'role_id'   =>      'required|integer',
        ];

        if (request()->routeIs('*.update')) {
            $rules['password']  =   'nullable|string|min:6|max:30';
        }

        return $rules;
    }
}
