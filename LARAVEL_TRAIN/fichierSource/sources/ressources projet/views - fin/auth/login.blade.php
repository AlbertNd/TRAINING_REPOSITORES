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
    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Mot de passe">
        <div class="checkbox">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Rester connecté
        </div>
        <input type="submit" value="Connexion">
    </form>
    <a href="{{ route('password.request') }}">Mot de passe oublié</a>
</main>
@endsection
