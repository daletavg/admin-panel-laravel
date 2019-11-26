<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PosterRequest extends FormRequest
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
        $data = [];
        switch ($this->getMethod())
        {
            case 'POST':
                $data =[
                    'price_before'=>'numeric',
                    'price_to'=>'numeric',
                    'url'=>'required|string|max:255|unique:posters,url'
                ];
            case 'PUT':
                $data =[
                    'price_before'=>'numeric',
                    'price_to'=>'numeric',
                    'url'=>'required|string|max:255'
                ];
        }
        return $data;
    }
}
