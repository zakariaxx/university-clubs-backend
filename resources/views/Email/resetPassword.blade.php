@component('mail::message')
# Reset Password


Réinitialisez ou modifiez votre mot de passe

@component('mail::button', ['url' => 'http://localhost:4200/change-password?token='.$token])

Changer le mot de passe

@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponen
