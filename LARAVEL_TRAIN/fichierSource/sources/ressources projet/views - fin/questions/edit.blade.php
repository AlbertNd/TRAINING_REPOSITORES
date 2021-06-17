@extends('layouts.app')

@section('content')
<main class="container auth">
    @if ($errors->has('question'))
    <div class="message error">
        {{ $errors->first('question') }}
    </div>
    @endif
    <form method="POST" action="{{ route('questions.update', $question->id) }}">
        @csrf
        @method('PUT')
        <textarea name="question">{{ $question->question }}</textarea>
        <input type="submit" value="Modifier">
    </form>
</main>
@endsection
