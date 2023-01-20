<x-mail::message>
# Ciao

Il tuo Ticket è stato inviato correttamente.
    Accedi alla tua dashboard per visualizzarlo

<x-mail::button :url="'Vai alla dashboard'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
