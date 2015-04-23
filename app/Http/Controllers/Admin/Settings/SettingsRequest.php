<?php namespace App\Http\Controllers\Admin\Settings;

use App\Http\Requests\Request;

class SettingsRequest extends Request {

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
			'site_title' => 'required',
			'site_slogan' => 'required',
			'site_description' => 'required',
			'site_keywords' => 'required',
			'site_url' => 'required',
			'site_author' => 'required',
			'site_image' => 'required',
			'short_about_us' => 'required',
			'privacy_policy' => 'required',
			'terms_of_service' => 'required',
		];
	}

}
