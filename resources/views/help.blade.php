@extends('index')

@section('title', 'Contribuir')

@section('content')
<div class="container">
  @if (session('success'))

  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif

  @if (session('warning'))

  <div class="alert alert-warning">
      {{session('warning')}}
  </div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-md-8 order-md-1">

            <h4 class="mb-3">Contribuir</h4>
          <form method="post" action="{{url('/unit')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-map"></i>
                    </div>
                  </div>
                  <select class="custom-select" id="all_states" aria-label="select" name="state">
                    <option selected>Estado...</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="input-group mb-3 ">
                  <div class="input-group-prepend ">
                    <div class="input-group-text">
                      <i class="fas fa-map"></i>
                    </div>
                  </div>
                  <select class="custom-select disable" id="all_cities" aria-label="select" name="city">
                    <option selected>Cidade...</option>
    
                  </select>
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-atlas"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Nome da Unidade" aria-label="Unit name" aria-describedby="basic-addon1" name="unit">
              </div>
            </div>
    
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="fileList" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <button class="btn btn-block btn-dark" type="submit">
                <i class="fas fa-upload"></i>
                Upload
              </button>
            </div>
          </form>
          
        </div>
        <div class="col-md-4 order-md-2 mb-4">
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

      {{-- Modal --}}
      <!-- Button trigger modal -->

      <hr>
    
      <h4 class="mb-3">Receber novidades</h4>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Registrar e-mail
      </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="/noty-user" method="POST">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-light" role="alert">
          Ao se registrar as atualizações ou adições de listas de jumbo serão notificadas no E-mail informado.

        </div>
        <div class="input-group flex-nowrap mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"> <i class="fas fa-envelope"></i> </span>
          </div>
          <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping" required name="email">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="notySelectState"> <i class="fas fa-city"></i> </label>
          </div>
          <select class="custom-select" id="notySelectState" name="notySelectState">
            <option selected>Estado...</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="notySelectCity"> <i class="fas fa-map"></i> </label>
          </div>
          <select class="custom-select" id="notySelectCity" name="notySelectCity">
            <option selected>Cidade...</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
    </div>
  </div>
</div>
      {{-- End Modal --}}
</div>
@endsection