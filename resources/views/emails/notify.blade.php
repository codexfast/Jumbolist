@component('mail::message')

# {{$unit}} registrada

A unidade **{{$unit}}** foi registrada na cidade {{$city}}-{{$initials}},
cheque agora clicando no botão abaixo.

@component('mail::button', ['url' => ''])
Checar
@endcomponent

Obrigado,<br>
{{ $app_name }}
@endcomponent
