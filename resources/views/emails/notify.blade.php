@component('mail::message')

# Nova registrada

Uma nova unidade foi registrada na cidade {{$city}}-{{$initials}},
cheque agora clicando no botão abaixo.

@component('mail::button', ['url' => $url])
Checar
@endcomponent

Obrigado,<br>
{{ $app_name }}
@endcomponent
