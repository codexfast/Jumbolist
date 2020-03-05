@extends('index')

@section('title', 'Doações')


@section('content')
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