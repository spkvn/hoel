<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'room_number' => 'required|numeric',
            'email' => 'required|email',
            'check_in' => 'required|date_multi_format:"d/m/Y","Y-m-d"',
            'check_out' => 'required|date_multi_format:"d/m/Y","Y-m-d"'
        ];
    }
}