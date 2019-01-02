<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AppRequest extends Request
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
            'name'        => 'required',
            'description' => 'required:min:6|max:140',
            'disqus'      => 'required|min:1',
            'ad'          => 'required|min:1'
        ];
    }
}