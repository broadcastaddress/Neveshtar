<?php namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\Request;

class UsersRequest extends Request {

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

		$id = (Request::segment(4));
		return [
			'name' => 'required',
			'email' => 'required|unique:users,email,'.$id,
			'type' => 'required',
			'status' => 'required',
		];
	}

}
