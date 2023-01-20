<x-mail::message>
# Benvenuto {{ $user->name }}

Grazie per esserti registrato.
    La tua mail è {{ $user->email }}
    Puoi aprire un ticket e contattare i nostri operatori ogni volta riscontri un problema.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Grazie,<br>
{{ config('app.name') }}
</x-mail::message>
