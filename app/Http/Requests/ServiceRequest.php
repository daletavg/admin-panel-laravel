<?php

namespace App\Http\Requests;

use App\Repository\LanguageRepository;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        switch ($this->getMethod()) {
            case 'POST':
                $rules =  ['data.*.name' => 'required|string|max:100'];
                break;
            case 'PUT':
                $rules = $this->langDataCheck('required|string|max:100');
                break;
        }
        return $rules;
    }

    private function langDataCheck($validation)
    {
        $rules = [];
        if ($this->request->has('data') && is_array($data = $this->request->get('data'))) {
            foreach ($data as $locale => $name) {
                if (LanguageRepository::isLanguageActive($locale)) {
                    array_push($rules,
                        ['data.' . $locale . '.name' => $validation]
                    );
                }
            }
        }
        return $rules;
    }

}
