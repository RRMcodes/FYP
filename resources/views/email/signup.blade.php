@component('mail::message')
    Dear {{$username}},

   Your user account has been created. please login in with following credentials:

    Email: {{$email}}
    Password: password

    please dont forget to change your password after login.

    Thank you,
    E-Clinic
@endcomponent
