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
            'title'=>'required|max:255',
            'description'=>'max:65535',
            'status'=>'numeric|between:0,9',
            'start_date'=>'required|date',
            'due_date'=>'required|date|after_or_equal:start_date'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'ввидите название задачи',
            'description.max'  => 'максимальный размер 65,535 символов',
            'status.required' => 'поставь статус задачи от 0 до 9',
            'start_date.required'=>'установите дату начала задачи',
            'due_date.required'=>'установите дату конца задачи'
        ];
    }
