<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'experience' => 'required | string',
            'depart_id' => 'required | numeric',
            'specialist' => 'required | string',
            'fee' => 'required | string',
            'clinic_address' => 'required | string',
            'about' => 'required | string',
            'day.*' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time.*' => 'required|date_format:H:i',
            'end_time.*' => 'required|date_format:H:i',
        ];
    }

    public  function prepareRequest()
    {
        $user = auth()->user();
        $request = $this;
        return [
            'user_id'=> $user->id,
            'experience' => $request['experience'],
            'depart_id' => $request['depart_id'],
            'specialist' => $request['specialist'],
            'fee' => $request['fee'],
            'clinic_address' => $request['clinic_address'],
            'about' => $request['about'],
            'slug'=> 'dr.' . strtolower($user->first_name) . '-' . strtolower($user->last_name),
            'day.*'=>$request['day'],
            'start_time.*'=>$request['start_time'],
            'end_time.*'=>$request['end_time'],
        ];

        // return $preparedData;
    }

}
