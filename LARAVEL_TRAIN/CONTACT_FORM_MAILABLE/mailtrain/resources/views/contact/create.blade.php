<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
    <form method="POST" action="/contact">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name')}}" class="form-control">
            <div>{{ $errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="text" name="email" value="{{ old('email')}}" class="form-control">
            <div>{{ $errors->first('email')}}</div>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"> {{ old('message')}}</textarea>
            <div>{{ $errors->first('message')}}</div>
        </div>

        @csrf

        <button type="submit" class="btn btn-primary"> Send message </button>
    </form>
</div>