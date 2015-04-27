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

		$id = (Request::segment(4));
		return [
			'title' => 'required',
			'slug' => 'required|unique:items,slug,'.$id,
			'language' => 'required',
			'category_id' => 'required|integer',
			'tags' => 'required',
			'status' => 'required',
			'type' => 'required',
		];
	}

}
