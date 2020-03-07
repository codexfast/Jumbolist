@extends('index')

@section('title', 'Início')


@section('content')
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="{{url('/logo.png')}}" alt="" width="72" height="72">
      <h2>Jumbolist</h2>
      <p class="lead">Dificuldades em obter lista de materiais para unidades prisionais? busque aqui na maior plataforma de lista de jumbo, você tambem pode ajudar mandado listas ou fazendo doações</p>
    </div>
  
    <div class="embed-responsive embed-responsive-16by9 mx-auto" style="max-width: 600px;">
        <iframe  src="https://www.youtube.com/embed/FWH0crWfUlk?controls=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
    </div>
    <div class="mt-3">
      <p class="lead text-center">Se a nossa plataforma foi util a você deixe seu like e realize uma doação para mante-la sempre online.</p>
    </div>
    
  </div>
  <div class="container">

    <div class="row">
        <div class="col">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Faça uma Doação</span>
                <i class="fas fa-star" style="color: #fbc52d;"></i>
              </h4>
              <ul class="list-group mb-3">
                @foreach ($donates as $donate)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <a class="btn btn-dark text-light" href="{{$donate->link}}">Doar</a>
                  <span class="text-muted">R$ {{ str_replace('.', ',', $donate->amount) }}</span>
                </li>
              @endforeach
                
              </ul>
        </div>
    </div>
    
</div>
@endsection