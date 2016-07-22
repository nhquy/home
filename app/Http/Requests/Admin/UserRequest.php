<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\User;

class UserRequest extends Request
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
    	if($this->segment(3)!="") {
			$user = User::find($this->segment(3));
		}

		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'name' => 'required|min:3',
					'email' => 'required|email|unique:users,email',
					'password' => 'required',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'name' => 'required|min:3',
					'email' => 'required|email|unique:users,email,'.$user->id,
				];
			}
			default:break;
		}
    }
}
