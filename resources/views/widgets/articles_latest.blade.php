@component('widgets.with_title', ['title' => __('Latest Articles')])
    @if ($articles)
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    {{ $article->published_at->format('d/m/Y') }}
                    {{ __('by') }} <a href="{{ route('users.show', $article->user->id) }}">{{ $article->user->name }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('No articles') }}</p>
        </div>
    @endif
@endcomponent
