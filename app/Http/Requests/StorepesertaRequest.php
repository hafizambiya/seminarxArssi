<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepesertaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_p' => 'required',
            'email_p' => 'required|email',
            'phone_p' => 'required',
            'jabatan' => 'required',
            'instansi' => 'required',
            'email_instansi' => 'required|email',
            'alamat' => 'required',
            'phone_instansi' => 'required',
            // 'seminar' => 'required',
            // 'workshop' => 'required',
            'password' => 'required',


        ];
    }
}
