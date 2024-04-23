<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'age' => 'required|integer',
            'country' => 'required | string',
            'state' => 'required | string',
            'city' => 'required | string',
        ];
    }

    public  function prepareRequest()
    {
        $request = $this;
        return [
            'image' => $request['image'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'age' => $request['age'],
            'country' => $request['country'],
            'state' => $request['state'],
            'city' => $request['city'],
        ];

    }

}
