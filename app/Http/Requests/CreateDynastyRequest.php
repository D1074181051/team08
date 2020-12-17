<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDynastyRequest extends FormRequest
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
            't_name' => 'required|string',
            'vids' => 'required|string',
            'capital' => 'required|string'
        ];
    }

    public function  messages()
    {
        return [
            "t_name.required" => "朝代名稱為必填",
            "t_name.string" => "朝代名稱必需為字串",
            "vids.required" => "經歷時間為必填",
            "vids.string" => "經歷時間必需為字串",
            "capital.required" => "舊時首都為必填",
            "capital.string" => "舊時首都必需為字串"
        ];
    }
}
