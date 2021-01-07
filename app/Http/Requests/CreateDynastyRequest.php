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
            's_time' => 'required|numeric|dateearlier:e_time',
            'e_time' => 'required|numeric',
            'capital' => 'required|string'
        ];
    }

    public function  messages()
    {
        return [
            "t_name.required" => "朝代名稱為必填",
            "t_name.string" => "朝代名稱必需為字串",
            "s_time.required" => "經歷時間(起)為必填",
            "s_time.numeric" => "經歷時間(起)必需為數字",
            //"s_time.min" => "經歷時間(起)必需大於0",
            "s_time.dateearlier" => "經歷時間(迄)必須大於經歷時間(起)",
            "e_time.required" => "經歷時間(迄)為必填",
            "e_time.numeric" => "經歷時間(迄)必需為數字",
            //"e_time.min" => "經歷時間(迄)必需大於0",
            "capital.required" => "舊時首都為必填",
            "capital.string" => "舊時首都必需為字串"
        ];
    }
}
