<?php namespace App\Http\Controllers\Admin\Testimonials;

use App\Http\Requests\Request;

class TestimonialsRequest extends Request {

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

		$id = (Request::segment(3));
		return [
			'name' => 'required',
			'title' => 'required',
			'description' => 'required',
			'author_image' => 'required',
		];
	}

}
