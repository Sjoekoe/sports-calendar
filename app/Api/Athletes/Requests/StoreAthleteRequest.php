<?php
namespace App\Api\Athletes\Requests;

use Dingo\Api\Http\FormRequest;

class StoreAthleteRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'email',
            'birthday' => 'required|date_format:d-m-Y',
        ];
    }
}
