<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;
use App\Hotel;

class HotelRequest extends Request {

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
			case 'POST':{
				$rule =[
					'txtName' 			=>'required|max:300|unique:hotels,name',
					'txtTourid'			=>'required',
					'txtLocation'		=>'required',
					'txtMap'			=>'required',
					'txtDes'			=>'required',
					'txtStatus'			=>'required',
					'imghotel'			=>'image|max:8000',
					'txtCateid'			=>'required',
					'txtRule'			=>'required',
					'txtPet'			=>'required',
					'txtPayment'		=>'required',
				];
				if(Input::file('detailimg') != ""){
					foreach(Input::file('detailimg') as $key => $val){
						$rule['detailimg.'.$key] ='image|max:8000';
					}
				}
				return $rule;
			}

			case 'PATCH':{
				$rule =[
					'txtName' 		=>'required',
					'txtTourid'		=>'required',
					'txtLocation'	=>'required',
					'txtMap'		=>'required',
					'txtDes'		=>'required',
					'txtStatus'		=>'required',
					'txtCateid'		=>'required',
					'imghotel'		=>'image|max:8000',
					'txtRule'			=>'required',
					'txtPet'			=>'required',
					'txtPayment'		=>'required',
				];
				$imgup = 0;
				if(Input::file('detailimg') != ""){
					foreach(Input::file('detailimg') as $key => $val){
						$imgup++;
						$rule['detailimg.'.$key] ='image|max:8000';
					}
				}
				if(Input::file('imghotel') != ""){
					$imgup++;
				}
				$id = $this->request->get('hdid');
				$arrimgdel = explode(',',$this->request->get('inforimg'));
				$numberimgdel = count($arrimgdel)-1;
				$hotel = Hotel::find($id);
				if($hotel->images){
					$arrimg = (array)json_decode($hotel->images);
					$allimg = $imgup + count($arrimg);

					$numberimgdel;
					if($allimg - $numberimgdel < 4){
						$rule['addmore'] = 'required';

					}
					if(in_array('0',$arrimgdel)){
						$rule['imghotel'] = 'required';
					}
				}
				return $rule;
			}

		}

	}
	public function messages(){
		$message =  [
			'txtName.required'			=>'Please Enter Name Hotel',
			'txtTourid.required'		=>'Please Choose Tour Parent ',
			'txtRule.required'			=>'Please Enter Rule For Children And Extra Bed',
			'txtPet.required'			=>'Please Enter Type Pet Agree In Hotel',
			'txtLocation.required'		=>'Please Enter Location Hotel',
			'txtMap.required'			=>'Please Enter Map Hotel',
			'txtDes.required'			=>'Please Enter Description Hotel',
			'imghotel.required'			=>'Please Choose Main Image Hotel',
			'txtPayment.required'		=>'Please Choose Type Payment',
			'txtCateid.required'		=>'Please Choose Category Parent',
			'imghotel.image'			=>'This File Not Is An Image',
			'imghotel.max'				=>'Size of File Upload Is 8MB',
			'addmore.required'			=>"Can Not Delete Before Delete Image,Please Add More Image. The Remaining Number Of Images Must Be Greater Than 4 ",
		];
		if(Input::file('detailimg') != ""){
			foreach (Input::file('detailimg') as $key => $val) {
				$messages['items.' . $key . '.image'] = 'This File Number .' . $key . '. From Detail Images Not True Images';
				$messages['items.' . $key . '.max'] = 'This File Number .' . $key . '. Size of File Upload Is 8MB';
			}
		}
		return $message;
	}

}
