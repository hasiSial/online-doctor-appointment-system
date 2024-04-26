<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleTimeRequest extends FormRequest
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
     * @return array
     */
    // public function rules(): array
    // {
    //     return [
    //         'appointID' => 'required|exists:day_times,id',
    //         'day' => 'required|array|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
    //         'start_time' => 'required|array|date_format:H:i:s',
    //         'end_time' => 'required|array|date_format:H:i:s|after:start_time',
    //         'duration' => 'required | string |in:10,15,20'
    //     ];
    // }

    public function rules(): array
    {
        return [
            'appointID' => 'required|exists:day_times,id',
            'day' => 'required|array|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time.*' => [
                'required',
                'date_format:H:i:s',
                function ($attribute, $value, $fail) {
                    // Custom validation to check time format "HH:mm:ss"
                    if (!preg_match('/^(?:[01]\d|2[0-3]):(?:[0-5]\d):(?:[0-5]\d)$/', $value)) {
                        $fail('The '.$attribute.' must be a valid time in "HH:mm:ss" format.');
                    }
                },
            ],
            'end_time.*' => [
                'required',
                'date_format:H:i:s',
                'after:start_time.*', // Validate that each end_time is after the corresponding start_time
                function ($attribute, $value, $fail) {
                    // Custom validation to check time format "HH:mm:ss"
                    if (!preg_match('/^(?:[01]\d|2[0-3]):(?:[0-5]\d):(?:[0-5]\d)$/', $value)) {
                        $fail('The '.$attribute.' must be a valid time in "HH:mm:ss" format.');
                    }
                },
            ],
            'duration' => 'required|string|in:10,15,20',
        ];
    }



    /**
     * Prepare the validated data for use in the application.
     *
     * @return array
     */
    public function prepareRequest(): array
    {
        // Retrieve the authenticated user
        $user = $this->user();
        $request = $this;

        // Prepare the data based on the validated input
        return [
            'appointID' => $request['appointID'],
            'day' => $request['day'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'duration' => $request['duration'],

        ];
    }
}

