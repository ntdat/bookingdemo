<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
class FacilitiesRequest extends Request {

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
			case 'POST':
			{
				 $rule =  [

					'txtTitle' =>'required|unique:rooms,name',
					'txtPosition'	=> 'required',
					'txtStatus'	=> 'required',
					'imgfac'	=> 'image',

				];
				if($this->request->get('txtIcon') ==""){
					$rule['imgfac']	= 'required';
				}
				return $rule;
			}
			case 'PATCH':{
				$rule  = [
					'txtTitle' =>'required',
					'txtPosition'	=> 'required',
					'txtStatus'	=> 'required',
					'imgfac'	=> 'image',
				];
				if(($this->request->get('delete_thumb') =="agree") && ($this->request->get('txtIcon') =="") && (Input::file('imgfac') =="") ){
					$rule['alo']	= 'required';
				}
				return $rule;
			}
		}
	}
	public function messages(){
		return [
			'txtTitle.required'=>	'Please Enter Title',
			'txtIcon.required'=>	'Please Enter Icon',
			'txtPosition.required'=>	'Please Enter Position',
			'txtStatus.required'=>	'Please Choose Status',
			'imgfac.required'=>	'Please Choose Image',
			'imgfac.image'=>	'This File Not Is An Image',
			'alo.required'=>	'Please Upload Image Or Use Font Icon To Replace When Delete Image Or Clear Input Font Icon',
		];
	}

}
