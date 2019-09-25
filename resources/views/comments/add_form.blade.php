<!-- Comment form on article page -->

<h4>
    {{ __('comments.header_add_form') }}
</h4>

{!! Form::open(['route' => 'comments.store', 'role'=>'form']) !!}
    @include('comments.form', ['article_id' => $article_id, 'submitButtonText' => __('comments.button_add_form')])
{!! Form::close() !!}
