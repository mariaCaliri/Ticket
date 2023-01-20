<x-mail::message>
# Benvenuto {{$operator->name}}

Sei stato aggiunto come operatore

<x-mail::button :url="'accedi alla tua dashboard'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
