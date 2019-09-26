<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use App\Article;

class PostArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Always returns true. ArticlePolicy used instead.
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
            'title' => ['required', 'max:255'],
            'body' => ['required', 'min:10'],
        ];
    }
}
