@component('widgets.with_title', ['title' => __('widgets.articles_latest')])
    @if ($articles)
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    {{ $article->published_at->diffForHumans() }}
                    {{ __('widgets.article_by') }} <a href="{{ route('users.show', $article->user->id) }}">{{ $article->user->name }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('widgets.no_articles') }}</p>
        </div>
    @endif
@endcomponent
