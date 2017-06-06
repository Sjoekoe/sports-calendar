<?php
namespace App\Api\Teams\Requests;

use Dingo\Api\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'user_id' => 'required',
        ];
    }
}
