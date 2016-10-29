<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;


class CarRequest extends Request {

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
		switch($this->method)
		{
			case "POST":
			{
				$rule =
					[
						'txtName'			=>'required|unique:cars,name',
						'txtQuality'		=>'required',
						'txtPrice'			=>'required',
						'txtStatus'			=>'required',
					];
				if(Input::File('imgcar') == ""){
					$rule['imgcar'] = "required";
				}else{
					foreach(Input::File('imgcar') as $key => $item){
						$rule['imgcar'.$key] = 'image|max:8000';
					}
				}
				return $rule;
			}
			case "PATCH":
			{

				$arrdel = explode(',',$this->request->get('inforimg'));
				$nimgdel = count($arrdel)-1;

				$rule =
					[
						'txtName'			=>'required',
						'txtQuality'		=>'required',
						'txtPrice'			=>'required',
						'txtStatus'			=>'required',
					];

				if(Input::File('imgcar') !=""){
					$imgup=0;
					foreach(Input::File('imgcar') as $key => $item){
						$rule['imgcar'.$key] = 'image|max:8000';
						$imgup++;
					}
				}

				if(($imgup+$this->request->get('numberimg') - $nimgdel) <3){
					$rule['addmore'] = 	"required";
				}
				return $rule;
			}
		}
	}
	public function messages()
	{
		 $messages = [
			"txtName.required" => "Please Enter Name",
			"txtQuality.required" => "Please Choose Quality",
			"txtPrice.required" => "Please Enter Price",
			"txtStatus.required" => "Please Choose Status",
			"addmore.required" => 	"Min Number Images Is 3, Please Add More Images Before Delete",
		];
		if(Input::file('imgcar') != ""){
			foreach (Input::file('imgcar') as $key => $val) {
				$messages['items.' . $key . '.image'] = 'This File Number .' . $key . '. From Detail Images Not True Images';
				$messages['items.' . $key . '.max'] = 'This File Number .' . $key . '. Size of File Upload Is 8MB';
			}
		}
		return $messages;
	}

}
