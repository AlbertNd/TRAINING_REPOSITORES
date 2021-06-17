@extends('layouts.app')

@section('content')
<main class="container posts article">
    @if (session('status'))
    <div class="message status">
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->has('answer'))
    <div class="message error">
        {{ $errors->first('answer') }}
    </div>
    @endif
    <article>
        <img src="{{ Gravatar::src($question->user->email) }}" alt="">
        <div class="infos">
            {{ $question->user->name }}
            <time datetime="{{ $question->created_at }}">@datetime($question->created_at)</time>
        </div>
        @can('updateAndDelete', $question)
        <ul>
            <li><a href="{{ route('questions.edit', $question->id) }}"><i class="fas fa-quidditch"></i></a></li>
            <li><a href="{{ route('questions.destroy', $question->id) }}" onclick="event.preventDefault(); document.getElementById('destroy').submit();"><i class="fas fa-minus"></i></a></li>
            <form id="destroy" action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </ul>
        @endcan
        <p>{{ $question->question }}</p>
    </article>
    <form method="POST">
        @csrf
        <textarea name="answer" placeholder="Ma réponse ...">{{ old('answer') }}</textarea>
        <input type="submit" value="Répondre">
    </form>
    @foreach ($answers as $answer)
    <div class="answer">
        <img src="{{ Gravatar::src($answer->user->email) }}" alt="">
        <div class="infos">
            {{ $answer->user->name }}
            <time datetime="{{ $answer->created_at }}">@datetime($answer->created_at)</time>
        </div>
        <p>{{ $answer->answer }}</p>
    </div>
    @endforeach
</main>
@endsection
