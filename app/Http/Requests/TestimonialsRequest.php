<?php

namespace App\Http\Requests;

use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialsRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if (strtotime($this->request->get('date')) !== false) {
            $this->request->set('date', Carbon::parse($this->request->get('date'))->format('Y-m-d'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = null;
        if ($this->request->get('type') === Testimonial::TYPE_DOCUMENT) {
            $rules = [
                'bio' => 'required|string|max:150',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required',
                'date' => 'required|date'
            ];
        } else {
            $rules = [
                'bio' => 'required|string|max:150',
                'testimonial' => 'required|string',
                'type' => 'required',
                'date' => 'required|date'
            ];
        }
        return $rules;
    }
}
