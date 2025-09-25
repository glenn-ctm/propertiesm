@component('mail::message')
# Sender Name: {{ $fname }} {{ $lname }}
# Sender Phone: {{ $phone }}
# Sender Email: {{ $email }}

# Requested Plan: {{ $plan }}

{{ $message }}

@endcomponent
