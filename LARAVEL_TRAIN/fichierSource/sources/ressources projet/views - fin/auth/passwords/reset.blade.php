@extends('layouts.app')

@section('content')
<main class="container auth">
    @if ($errors->has('email'))
    <div class="message error">
        {{ $errors->first('email') }}
    </div>
    @endif
    @if ($errors->has('password'))
    <div class="message error">
        {{ $errors->first('password') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.request') }}" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Modifier">
    </form>
</main>
@endsection
