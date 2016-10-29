<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginResquest extends Request {

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
			"txtEmail"=>"required",
			"txtPassword"=>"required",
		];
	}
	public function messages()
	{
		return [
			'txtEmail.required'	=>	'Please enter email',
			'txtPassword.required' =>	'Please enter password',
		];
	}

}
