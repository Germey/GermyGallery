<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfigRequest extends Request {

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
            'description' => 'required',
            'bar_color' => 'required',
            'icon_border_color' => 'required',
            'panel_color' => 'required',
            'title_color' => 'required',
            'description_color' => 'required',
            'date_color' => 'required',
		];
	}

}
