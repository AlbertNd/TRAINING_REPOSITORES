@extends('layouts.app')

@section('content')
<main class="container auth">
    @if ($errors->has('question'))
    <div class="message error">
        {{ $errors->first('question') }}
    </div>
    @endif
    <form method="POST" action="{{ route('questions.store') }}" novalidate>
        @csrf
        <textarea name="question" placeholder="Ecrivez votre question">{{ old('question') }}</textarea>
        <input type="submit" value="Publier">
    </form>
</main>
@endsection
