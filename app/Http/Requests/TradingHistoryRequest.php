<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TradingHistoryRequest extends FormRequest
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
        $rules = [
            'trading_date' => 'required|date',
            'code' => 'required|max:3',
            'number'=> 'required',
            'buy_price' => 'required',
        ];
        
        return $rules;
    }
}
