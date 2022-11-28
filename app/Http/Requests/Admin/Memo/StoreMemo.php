<?php

namespace App\Http\Requests\Admin\Memo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMemo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.memo.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'odependency' => ['required'],
            'number_memo' => ['required', 'string'],
            'ref_obs' => ['required', 'string'],
            'date_doc' => ['required', 'date'],
            'date_entry' => ['required', 'date'],
            'date_exit' => ['required', 'date'],
            'ddependency_id' => ['required'],
            'admin_user' => ['required'],

        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getOdependencyId()
    {
        return $this->get('odependency')['id'];
    }

    public function getDdependencyId()
    {
        return $this->get('ddependency')['id'];
    }

    public function getUserId()
    {
        return $this->get('admin_user')['id'];
    }
}
