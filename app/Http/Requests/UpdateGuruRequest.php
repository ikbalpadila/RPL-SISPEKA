<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuruRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nip' => 'required|unique:gurus,nip,' . $this->guru->id,
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
