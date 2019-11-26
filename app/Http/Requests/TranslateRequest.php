<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && (auth()->user()->can('create_translate')|| auth()->user()->can('edit_translate'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data =[
            'key'=>'required|string|max:255',
            'group'=>'required'
        ];
        if($this->request->has('comment')){
            array_push($data,[
                'comment'=>'required|string|max:255'
            ]);
        }

        return $data;
    }
}
