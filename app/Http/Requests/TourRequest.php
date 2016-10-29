<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Tour;
use Input;
use Redirect;
class TourRequest extends Request {

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

			switch($this->method())
		{
			case 'POST':
			{
				 $rule = [
					'txtName'			=>'required|unique:tours,name',
					'txtLocation'		=>'required',
					'txtArea'			=>'required',
					'txtCurrency'		=>'required',
					'txtIntro'			=>'required',
					'txtNature'			=>'required',
					'txtNightlife'		=>'required',
					'txtHistory'		=>'required',
					'imgtour'       	=>'required|image',
					'txtParent'			=>'required',
					'rdoVisa'			=>'required',
					'rdoStatus'			=>'required',
				];
				if($this->request->get('detailimg') != ""){
					foreach($this->request->get('detailimg')as $key => $val){
						$rule['detailimg.'.$key] ='required|image';
					}
				}
				return $rule;
			}
			case 'PATCH':
			{
			 	$id = $this->request->get('hdid');
				$tour = Tour::find($id);
				json_decode($tour->images);

				$rule =[

					'txtName'			=>'required|',
					'txtLocation'		=>'required',
					'txtArea'			=>'required',
					'txtCurrency'		=>'required',
					'txtIntro'			=>'required',
					'txtNature'			=>'required',
					'txtNightlife'		=>'required',
					'txtHistory'		=>'required',
					'txtParent'			=>'required',
					'rdoVisa'			=>'required',
					'rdoStatus'			=>'required',

				];
				$imgdel  = explode(',',$this->request->get('inforimg'));
				$numberimgdel  = count($imgdel) - 1;
				$imgup = 0;
				if(Input::file('detailimg') != ""){
					foreach(Input::file('detailimg') as $key => $val){
						$imgup++;
						$rule['detailimg.'.$key] ='image|max:8000';
					}
				}
				if($tour->images){
					$arrimg = (array)json_decode($tour->images);
					$count = count($arrimg);
					if((($count+$imgup) - $numberimgdel) < 4){
						$rule['addmore'] ='required';
					}
					if(array_search('0',$imgdel)){
						$rule['imgtour'] = 'required';
					}
				}
				return $rule;
			}
			default:break;
		}


	}
	public function messages()
	{
		$messages =  [

			'txtName.required'		    =>'Please Enter Tour Name',
			'txtName.unique'		    =>'Tour Name Really Exits',
			'txtLocation.required'		=>'Please Enter Tour Location',
			'txtArea.required'		    =>'Please Enter Tour Area',
			'txtCurrency.required'		=>'Please Enter Tour Currency',
			'txtIntro.required'		    =>'Please Enter Tour Intro',
			'txtNature.required'		=>'Please Enter Tour Nature',
			'txtNightlife.required'		=>'Please Enter Tour Nightlife',
			'txtHistory.required'		=>'Please Enter Tour History',
			'imgtour.required'		    =>'Please Choose Tour Images',
			'imgtour.image'		    	=>'Main Images Not True Images',
			'txtParent.required'		=>'Please Enter Tour Parent',
			'rdoVisa.required'			=>'Please Choose Visa Require',
			'rdoStatus.required'		=>'Please Choose Status Require',
			'addmore.required'			=>"Can Not Delete Before Delete Image,Please Add More Image. The Remaining Number Of Images Must Be Greater Than 4 ",
		];
		if(Input::file('detailimg') != ""){
			foreach (Input::file('detailimg') as $key => $val) {
				$messages['items.' . $key . '.image'] = 'This File Number .' . $key . '. From Detail Images Not True Images';
			}
		}
		return $messages;
	}

}
