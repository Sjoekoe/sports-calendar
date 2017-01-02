<?php
namespace App\Api\Accounts\Requests;

use Dingo\Api\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'email' => 'email|required',
        ];
    }
}
