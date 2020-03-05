@extends('index')

@section('title', '')


@section('content')
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="{{url('/logo.png')}}" alt="" width="72" height="72">
      <h2>Jumbolist</h2>
      <p class="lead">Dificuldades em obter lista de materiais para unidades prisionais? busque aqui na maior plataforma de lista de jumbo, você tambem pode ajudar mandado listas ou fazendo doações</p>
    </div>
  
    <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/FWH0crWfUlk?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
    </div>
    
  </div>
@endsection