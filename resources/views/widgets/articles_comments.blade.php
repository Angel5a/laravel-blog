@component('widgets.with_title', ['title' => __('Most commended Articles')])
    @if ($articles)
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    {{ trans_choice('{0} no comments|[1] :count comment|[2,*] :count comments', $article->comments_count) }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('No articles') }}</p>
        </div>
    @endif
@endcomponent
