<?php namespace App\Http\Controllers\Admin\Categories;

use App\Http\Requests\Request;

class CategoriesRequest extends Request {

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
			'order' => 'required',
			'status' => 'required',
		];
	}

}
