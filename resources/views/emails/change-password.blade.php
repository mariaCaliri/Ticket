<x-mail::message>
# ciao!

La password è stata modificata con successo!

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
