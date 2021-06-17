@extends('layouts.app')

@section('content')
<main class="container auth">
    @if ($errors->has('name'))
    <div class="message error">
        {{ $errors->first('name') }}
    </div>
    @endif
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
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
        <input type="text" name="name" placeholder="Nom complet" value="{{ old('name') }}">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Inscription">
    </form>
</main>
@endsection
