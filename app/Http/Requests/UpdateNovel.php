<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNovel extends FormRequest
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
            'name' => 'required|min:3|max:191' . $this->id,
            'author' => 'required|min:3',
            'date_release' => 'required',
            'status' => 'required|min:3',
            'translator' => 'required|min:3',
            'description' => 'required|min:50',
            'cover' => 'mimes:jpeg,bmp,png',
        ];
    }
}
