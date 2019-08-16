<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /** Создание авторизации **/
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    /** Создание правил для вывода в json **/
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'max:65535',
            'status' => 'numeric|between:0,9',
            'start_date'=>'date',
            'due_date'=>'date|after_or_equal:start_date',
        ];
    }

    /** Сообщения для вывода в json **/
//    public function messages()
//    {
//        return [
//            'title.required' => 'Введите задачу заново',
//            'description.required' => 'Описание задачи не было введено',
//            'status.required' => 1,
//            'start_date.required' => '13.08.2019',
//            'due_date.required' => '16.08.2019',
//
//        ];
//    }
}
