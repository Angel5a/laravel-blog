@component('widgets.with_title', ['title' => __('widgets.articles_comments')])
    @if ($articles)
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    {{ trans_choice('widgets.comments_count', $article->comments_count) }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('widgets.no_articles') }}</p>
        </div>
    @endif
@endcomponent
