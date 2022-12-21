<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BalanceRequest extends FormRequest
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
            'user_id' => 'required'
        ];
    }

    public function prepaireRequest(){
        $request = $this;
        return [
            'user_id'       => $request->user_id,
            'amount'        => $request->amount,
            'status'        => 'Transfered',
        ];
    }
}
