@extends('layouts.app')

@section('content')
<main class="container posts articles">
    @foreach ($questions as $question)
    <article>
        <img src="{{ Gravatar::src($question->user->email) }}" alt="">
        <p><a href="{{ route('questions.show', $question->id) }}">{{ $question->question }}</a></p>
        @can('updateAndDelete', $question)
        <ul>
            <li><a href="{{ route('questions.edit', $question->id) }}"><i class="fas fa-quidditch"></i></a></li>
            <li><a href="{{ route('questions.destroy', $question->id) }}" onclick="event.preventDefault(); document.getElementById('destroy{{ $loop->iteration }}').submit();"><i class="fas fa-minus"></i></a></li>
            <form method="POST" id="destroy{{ $loop->iteration }}" action="{{ route('questions.destroy', $question->id) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </ul>
        @endcan
    </article>
    @endforeach
</main>
@endsection
