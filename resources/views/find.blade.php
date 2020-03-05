@extends('index')

@section('title', 'Buscar - Lista de Jumbos Online')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Buscar lista</h4>
          <form>
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-map"></i>
                    </div>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01" aria-label="select">
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
                  <select class="custom-select disable" id="inputGroupSelect02" aria-label="select">
                    <option selected>Cidade...</option>
    
                  </select>
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                  <div class="btn input-group-text">
                    <i class="fas fa-atlas"></i>
                  </div>
                </div>
                <select class="custom-select" id="inputGroupSelect03" aria-label="select">
                  <option selected>Unidade...</option>
    
                </select>
              </div>
            </div>
    
            <div class="mb-3">
              <button class="btn btn-block btn-dark" id="find_lists">
                <i class="fas fa-search"></i>
                Buscar
              </button>
            </div>
        </form>
    
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-list"></i>
                Listas
              </div>
    
              <div id="results">
                <h6 class="p-3 text-center">Filtre uma lista</h6>
              </div>
            </div>
    
            <hr>
    
            <h4 class="mb-3">Contribuir</h4>
          <form class="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-map"></i>
                    </div>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01" aria-label="select">
                    <option selected>Estado...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
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
                  <select class="custom-select disable" id="inputGroupSelect02" aria-label="select">
                    <option selected>Cidade...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
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
                <input type="text" class="form-control" placeholder="Nome da Unidade" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
    
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <button class="btn btn-block btn-dark">
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
</div>
@endsection