<?php namespace App\Http\Controllers\Admin\Items;

use App\Http\Requests\Request;

class ItemsRequest extends Request {

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
			'title' => 'required',
			'slug' => 'required|unique:categories',
			'language' => 'required',
			'category_id' => 'required|integer',
			'tags' => 'required',
			'status' => 'required',
		];
	}

}
