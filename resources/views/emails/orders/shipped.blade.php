@component('mail::message')
# MR Music

Vaša porudžbina je uspešno kreirana.<br>
Njen status možete proveriti klikom na dugme.
@component('mail::button', ['url' => 'http://code.com/dashboard/bills'])
Status porudžbine
@endcomponent

Hvala,<br>
MR Music
@endcomponent
