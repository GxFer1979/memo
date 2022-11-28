<?php

namespace App\Http\Requests\Admin\Memo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMemo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.memo.edit', $this->memo);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'odependency' => ['sometimes'],
            'number_memo' => ['sometimes', 'string'],
            'ref_obs' => ['sometimes', 'string'],
            'date_doc' => ['sometimes', 'date'],
            'date_entry' => ['sometimes', 'date'],
            'date_exit' => ['sometimes', 'date'],
            'ddependency' => ['sometimes'],
            'admin_user' => ['sometimes'],

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
