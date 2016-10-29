<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class RoomRequest extends Request {

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
		switch($this->method()){
			case "POST":
			{
				return $rule =
					[
						'txtName'				=>'required|unique:rooms,name',
						'txtHotelid'			=>'required',
						'txtQuality'			=>'required',
						'txtPrice'				=>'required',
						'txtStatus'				=>'required',
						'imgroom'				=>'required',
					];
			}
			case "PATCH":
			{
				 $rule =  [
					'txtName'				=>'required',
					'txtHotelid'			=>'required',
					'txtQuality'			=>'required',
					'txtPrice'				=>'required',
					'txtStatus'				=>'required',
				];
				if($this->request->get('delete_thumb') =="agree" &&( Input::File('imgroom') =="")){
					$rule['imgroom'] = "required";
				}
				return $rule;
			}
		}
	}
	public function messages(){
		return $messages =
			[
				'txtName.required'			=>'Please Enter Name',
				'txtHotelid.required'		=>'Please Choose Hotel',
				'txtQuality.required'		=>'Please Choose Quality',
				'txtPrice.required'			=>'Please Enter Price',
				'txtStatus.required'		=>'Please Choose Status',
				'imgroom.required'			=>'Please Choose Image',
			];
	}

}
