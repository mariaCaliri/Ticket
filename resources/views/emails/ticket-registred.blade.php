<x-mail::message>
# Ciao Admin,

Un nuovo ticket è stato creato.
    Accedi alla dashboard per visualizzarlo.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
