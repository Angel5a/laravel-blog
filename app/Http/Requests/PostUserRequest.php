<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Note: UserPolicy used instead.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /*return [
            'body' => 'required|min:2|max:1',   // This would always fail
        ];*/
        $rules = [
            'name' => 'required|max:255',
        ];
        //$currentUser = \Auth::user();
        $currentUser = $this->user();
        if ($currentUser->isAdmin()) {
            $rules['role'] = 'required|in:admin,moderator,user,banned';
        } elseif ($currentUser->isModerator()) {
            $rules['role'] = 'required|in:user,banned';
        } elseif ($currentUser->isBanned()) {
            $rules['role'] = 'required|in:banned';
        } else {
            $rules['role'] = 'required|in:user';
        }

        return $rules;
    }
}
