<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 08.11.18
 * Time: 11:38
 */

namespace App\Shop\Comments\Requests;


use App\Shop\Base\BaseFormRequest;

class AddCommentsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'text' => ['required'],
        ];
    }
}
