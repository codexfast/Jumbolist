@extends('app');

@section('title', 'Dashboard - Jumbolist')

@section('content')

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-4 col-md-4">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">Unidades Cadastradas</div>

            <div class="card-body">334</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-warning text-white mb-4">
            <div class="card-header">Requisições</div>

            <div class="card-body">6</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-success text-white mb-4">
            <div class="card-header">Total de Listas</div>

            <div class="card-body">340</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-plus-circle mr-1"></i>Adicionar lista</div>
            <div class="card-body">
                <form method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="selectStateByUnity">Estado</label>
                        </div>
                        <select class="custom-select" id="selectStateByUnity">
                          <option selected>Escolha</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="selectCityByUnity">Cidade</label>
                        </div>
                        <select class="custom-select" id="selectCityByUnity">
                          <option selected>Escolha</option>

                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="select">Unidade</label>
                        </div>
                        <select class="custom-select" id="select">
                          <option selected>Escolha</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="fileInput">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
                          <label class="custom-file-label" for="fileInput" name="fileList">Escolha um arquivo</label>
                        </div>
                      </div>
                      <button class="btn btn-primary">
                          <i class="fas fa-plus"></i>
                          ADD
                      </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-atlas mr-1"></i>Adicionar Unidade</div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="selectState">Estado</label>
                        </div>
                        <select class="custom-select" id="selectState">
                          <option selected>Escolha</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="selectCity">Cidade</label>
                        </div>
                        <select class="custom-select" id="selectCity">
                          <option selected>Escolha</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-atlas"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Unidade" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        ADD
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
    <div class="card-body">
        <div class="table-responsive">
            
        </div>
    </div>
</div>
<script src="{{url('/js/dashboard.js')}}"></script>

@endsection