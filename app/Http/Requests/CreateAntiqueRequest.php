<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAntiqueRequest extends FormRequest
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
            'p_name' => 'required|string',
            'dynasty_ID' => 'required|string',
            'location' => 'required|string',
            'long' => 'required|numeric',
            'width' => 'required|numeric'
        ];
    }

    public function  messages()
    {
        return [
            "p_name.required" => "古物名稱為必填",
            "p_name.string" => "古物名稱必須為字串",
            "dynasty_ID.required" => "朝代名稱為必填",
            "dynasty_ID.string" => "朝代名稱必須為字串",
            "location.required" => "收藏地為必填",
            "location.string" => "收藏地必須為字串",
            "long.required" => "長度為必填",
            "long.numeric" => "長度必須為數字",
            "width.required" => "寬度為必填",
            "width.numeric" => "寬度必須為數字"
        ];
    }
}
