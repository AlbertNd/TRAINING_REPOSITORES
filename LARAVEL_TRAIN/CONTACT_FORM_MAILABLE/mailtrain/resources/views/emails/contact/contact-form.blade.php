@component('mail::message')

# Merci pour votre message

<strong>Name : </strong> {{ $data['name']}}

<strong>Email : </strong> {{ $data['email']}}

<strong>Message</strong>

{{$data['message']}}

@endcomponent