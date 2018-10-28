<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMedicineRequest extends FormRequest
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
        return [
            'code' => 'required',
            'distributor_id' => 'required|not_in:0',
            'type' => 'required',
            'pack' => 'required',
            'name' => 'required',
            'itemdescription' => 'required',
            'qty' => 'required',
            'rate' => 'required',
            'expdate'=> 'required',
            'batchnumber' => 'required',
            'mrp' => 'required',

        ];
    }

    public function messages()
    {
    return [
        'distributor_id.not_in'  => 'Please choose party from the list',
        'name.required' => 'A name is required',
      ];
    }
}
