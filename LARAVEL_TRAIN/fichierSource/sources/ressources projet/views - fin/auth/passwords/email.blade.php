@extends('layouts.app')

@section('content')
<main class="container auth">
    @if (session('status'))
    <div class="message status">
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->has('email'))
    <div class="message error">
        {{ $errors->first('email') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
        <input type="submit" value="Envoyer">
    </form>
</main>
@endsection
