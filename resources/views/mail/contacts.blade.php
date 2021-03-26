@component('mail::message')
# Grazie dell'Ordine {{ $name }}

La consegna del tuo ordine è prevista per giorno {{ $delivery_date }}
alle ore {{ $delivery_time }} in {{ $customer_address }}, 
presso {{ $name }}.

Il costo totale è di {{ $amount }} €

In caso di problemi o ritardi verrai contattato alla seguente mail: {{ $email }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Vai al Sito
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
