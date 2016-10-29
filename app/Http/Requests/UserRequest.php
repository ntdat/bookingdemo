<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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

		$rule =
			[
				"txtfirstname"=>"required",
				"txtlastname"=>"required",
				"txtUsername"=>"required|min:5|unique:users,username",
				"txtEmail"=>"required|email|unique:users,email",
				'pass_confirmation' => 'required|min:6',
				'pass' => 'required|min:6|confirmed',

			];

		return $rule;
	}
	public function messages()
	{
		return [
			'txtfirstname.required'	=>	'Please enter first name',
			'txtlastname.required'	=>	'Please enter last name',
			'txtUsername.required'	=>	'Please enter username',
			'pass.required' =>	'Please enter password',
			'pass.confirmed' =>	'Password and Repassword incorrect',
			'pass.min' =>	'Password shoter than 8 character',
			'txtEmail.required' =>	'Please enter your email',
			'txtEmail.email' =>	'Your email incorrect',
			'txtEmail.unique' =>	'Your email ready registed',
			'username.required' =>	'Please enter username',
			'username.min' =>	'Username shoter than 6 character',
			'username.unique' =>	'Username ready registed',
		];
	}

}
