<!-- Comment form on article page -->

<h4>
    {{ __('Comment this article') }}
</h4>

{!! Form::open(['route' => 'comments.store', 'role'=>'form']) !!}
    @include ('comments.form', ['article_id' => $article_id, 'submitButtonText' => __('Add Comment')])
{!! Form::close() !!}
