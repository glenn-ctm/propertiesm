@component('mail::message')
# Sender Name: {{ $fname }} {{ $lname }}
# Sender Email: {{ $email }}
# Sender Phone: {{ $phone }}

{{ $message }}
@endcomponent
