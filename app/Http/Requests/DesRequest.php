<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class DesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	public function rules()
	{
		switch($this->method)
		{
			case "POST":
			{
				$rule =
					[
						'txtName'			=>'required|unique:destinations,name',
						'txtDes'			=>'required',
						'rdoStatus'			=>'required',
						'txtParent'			=>'required',
					];
				if(Input::File('desimgs') == ""){
					$rule['desimgs'] = "required";
				}else{
					foreach(Input::File('desimgs') as $key => $item){
						$rule['desimgs'.$key] = 'image|max:8000';
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
						'txtDes'			=>'required',
						'rdoStatus'			=>'required',
						'txtParent'			=>'required',
					];

				if(Input::File('desimgs') !=""){
					$imgup=0;
					foreach(Input::File('desimgs') as $key => $item){
						$rule['desimgs'.$key] = 'image|max:8000';
						$imgup++;
					}
					if(($imgup+$this->request->get('numberimg') - $nimgdel) <3){
						$rule['addmore'] = 	"required";
					}
				}


				return $rule;
			}
		}
	}
	public function messages()
	{
		$messages = [
			"txtName.required" => "Please Enter Name",
			"txtTop.required" => "Please Choose Show at index",
			"txtDes.required" => "Please Enter Destinations",
			"rdoStatus.required" => "Please Choose Status",
			"addmore.required" => 	"Min Number Images Is 3, Please Add More Images Before Delete",
		];
		if(Input::file('desimgs') != ""){
			foreach (Input::file('desimgs') as $key => $val) {
				$messages['items.' . $key . '.image'] = 'This File Number .' . $key . '. From Detail Images Not True Images';
				$messages['items.' . $key . '.max'] = 'This File Number .' . $key . '. Size of File Upload Is 8MB';
			}
		}
		return $messages;
	}


}
