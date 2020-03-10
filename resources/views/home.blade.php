@extends('index')

@section('title', 'Início')

@section('content')
{{-- carousel --}}

@if (count($banners) > 0)
    
<div class="container py-2">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
  @foreach ($banners as $banner)

    @if ($loop->index == 0)
    <div class="carousel-item active">
    @else
    <div class="carousel-item">    
    @endif
      <img src="{{url('/banners/'.$banner->banner)}}" class="d-block w-100" alt="{{$banner->banner}}">
  </div>      
  @endforeach
</div>
</div>
</div>
@endif
{{-- end carousel --}}
<div class="container">

  
    <div class="embed-responsive embed-responsive-16by9 mx-auto m-2" style="max-width: 600px;">
        <iframe  src="https://www.youtube.com/embed/FWH0crWfUlk?controls=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
    </div>
    <div class="mt-3">
      <p class="lead text-center">Se a nossa plataforma foi util a você deixe seu like e realize uma doação para mante-la sempre online.</p>
    </div>
    
  </div>
  <div class="container">

    <div class="d-flex justify-content-center">
      <div class="donates" style="min-width:400px;">
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