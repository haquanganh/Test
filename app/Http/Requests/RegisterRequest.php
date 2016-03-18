<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
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
        $rules = [
            'in_Email' =>'required|unique:users,email',
            'in_EName' => 'required|min:2|max:15',
            'in_Name'=> 'required|max:50',
            'in_Address' => 'min:4',
            'in_Phone' => 'min:10|max:11|required|unique:Employee,E_Phone',
            'sl_Role' => 'required',
            'in_Skype' => 'min:6|max:32|required|unique:Employee,E_Skype',
            'in_CostHour' => 'required|min:1|max:4',
            'in_Password' => 'required',
            'in_Repassword' => 'required',
            'in_id' => 'required|min:10|max:10|unique:Employee,idEmployee',
            'in_Year.0' => 'required',
            'in_img' => 'required|min:0|max:6144|image|mimes:jpg,jpeg,png',
        ];
        if($this->request->get('in_Year') == true){
            foreach ($this->request->get('in_Year') as $key => $value) {
            $rules['in_Year.'.$key] = 'required';
            }
        }
        // for($j = 0 ; $j < $request->number_rows ; $j++){
        //     $name_in_Skill = 'sl_Skill'.$j;
        //     for($k = $j+1 ; $k < $request->number_rows; $k++){
        //         $name_in_Skill1 = 'sl_Skill'.$k;
        //         if($request->$name_in_Skill == $request->$name_in_Skill1){
        //             'duplicated.'
        //         }
        //     }
        // }
        return $rules;
    }
    public function messages(){
        $messages= [
            'in_Email.required' =>'Please enter the Email',
            'in_Email.unique' => 'The Email already exists',
            'in_EName.required' => 'Please enter the English Name',
            'in_EName.min' => 'The English name must be container equal or more than 2 characters',
            'in_EName.max' => 'The English name must be container equal or less than 15 characters ',
            'in_Name.required'=> 'Please enter the Full Name',
            'in_Phone.required' => 'Please enter the Phone',
            'in_Name.max' => 'Please enter the Full Name is less than 50 characters',
            'in_Phone.min' => 'Please enter the Phone is more than 10 numbers',
            'in_Phone.max' => 'Please enter the Phone is equal or less than 11 numbers',
            'in_Phone.unique' => 'The Phone already exists',
            'in_Skype.required' => 'Please enter the Skype',
            'in_Skype.min' => 'Please enter the Skype address is equal or more than 6 characters',
            'in_Skype.max' => 'Please enter the Skpe address is equal or less than 32 characters',
            'in_Skype.unique' => 'The Skype Address already exists',
            'sl_Role.required' => 'Please enter the Role',
            'in_CostHour.required' => 'Please enter the CostHour',
            'in_CostHour.min' => 'The CostHour must be contained equal or more than 1',
            'in_CostHour.max' => 'The CostHour must be contained equal or less than 4 characters',
            'in_Password.required' => 'Please enter the password',
            'in_Repassword.required' => 'Please enter repassword',
            'in_id.required' => 'Please enter the Id of Employee',
            'in_id.unique' => 'The Id already exists',
            'in_id.min' => 'The Id must be contained 10 characters',
            'in_id.max' => 'The Id must be contained 10 characters ',
            'in_Year.0.required' =>' Please add skill',
            'in_img.min' => 'Please upload file with size is more than 0MB',
            'in_img.max' => 'Please upload a file with size is less than 6MB',
            'in_img.image' => 'Please upload a picture',
            'in_img.required' =>'Please upload a file',
            'in_img.mimes' => 'Please upload a picture with mimes : jpg, jpeg, png',
            'in_Address.min' => 'The Address must be contained equal or more than 4 characters',
        ];
        if($this->request->get('in_Year') == true){
            foreach ($this->request->get('in_Year') as $key => $value) {
            $messages['in_Year.'.$key.'.required'] = 'Please enter the year';
            }
        }
        return $messages;
    }
}
