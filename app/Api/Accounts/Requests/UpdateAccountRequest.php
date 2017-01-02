<?php
namespace App\Api\Accounts\Requests;

use Dingo\Api\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name' => 'min:3|required',
            'email' => 'required|email',
        ];
    }
}
