<?php

namespace App\Http\Requests;

use App\Rules\CheckPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'oldPassword'=> ['required','different:newPassword', new CheckPassword(Auth::user()->getAuthPassword())],
            'newPassword'=> 'required|same:repeatNewPassword|min:8',
            'repeatNewPassword'=>'required|min:8'
        ];
    }
}
