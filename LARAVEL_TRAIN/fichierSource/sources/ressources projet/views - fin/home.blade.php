@extends('layouts.app')

@section('content')
<main class="container auth">
    @if (session('status'))
    <div class="message status">
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->has('password_old'))
    <div class="message error">
        {{ $errors->first('password_old') }}
    </div>
    @endif
    @if ($errors->has('password'))
    <div class="message error">
        {{ $errors->first('password') }}
    </div>
    @endif
    <form method="POST" action="{{ route('compte.update') }}" novalidate>
        @csrf
        @method('PUT')
        <input type="password" name="password_old" placeholder="Ancien mot de passe">
        <input type="password" name="password" placeholder="Nouveau mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Modifier">
    </form>
</main>
@endsection
