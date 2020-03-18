@extends('app');

@section('title', 'Dashboard -')

@section('content')

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-4 col-md-4">
        <div class="card bg-primary text-white mb-4">
            <div class="card-header">
                <i class="fas fa-university"></i>
                Unidades Cadastradas</div>

            <div class="card-body">
                <strong>{{$units_length}}</strong>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-warning text-white mb-4">
            <div class="card-header">
                <i class="fas fa-project-diagram"></i>
                Pendentes</div>

        <div class="card-body">
            <strong>{{$request_length}}</strong>
        </div>

        </div>
    </div>

    <div class="col-xl-4 col-md-4">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                Metric View</div>

            <div class="card-body">
                <strong>{{$metric_view}}</strong>
            </div>
        </div>
    </div>
    

</div>
<div class="row">

    <div class="col-xl-4">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-atlas mr-1"></i>Adicionar Unidade & Lista</div>
            <div class="card-body">
                <form action="{{url('/admin/unit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="selectState">Estado</label>
                        </div>
                        <select class="custom-select" id="selectState" name="stateSelected" required>
                          <option selected>Escolha</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="selectCity">Cidade</label>
                        </div>
                        <select class="custom-select" id="selectCity" name="citySelected" required>
                          <option selected>Escolha</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-atlas"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Unidade" aria-label="Username" aria-describedby="basic-addon1" name="unit" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="fileInput">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInput" name="fileList">
                          <label class="custom-file-label" for="fileInput">Lista (Opcional)</label>
                        </div>
                      </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-plus"></i>
                        ADD
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-map mr-1"></i>Unidades, Cidades & Estados</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ação</th>
                                <th>Unidade</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ação</th>
                                <th>Unidade</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                     
                            @foreach ($units as $unit)
                                <tr>
                                    <td>
                                        <form action="{{url('/admin/unit')}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            
                                            @csrf
                                            <input hidden value="{{$unit->id}}" name="id">
                                            <button class="btn btn-flat" type="submit">
                                                <i class="fas fa-minus-circle text-danger"></i>
                                                Deletar
                                            </button>
                                        </form>

                                        @isset($unit->list)
                                            
                                        <a class="btn btn-flat" href="{{url('/files/'.$unit->list)}}" target="_blank">
                                            <i class="fas fa-download text-muted"></i>
                                            Visualizar
                                        </a>
                                        @endisset
                                    </td>
                                    <td>
                                        {{ $unit->unit }}
                                        
                                    </td>
                                    <td>
                                        {{ $unit->city }}
                                        
                                    </td>
                                    <td>
                                        {{ $unit->initials }}
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-map mr-1"></i>Unidades, Cidades & Estados <strong class="text-danger">(Pendentes)</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ação</th>
                                <th>Unidade</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ação</th>
                                <th>Unidade</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                     
                            @foreach ($units_pendent as $unit)
                                <tr>
                                    <td>
                                        <form action="{{url('/admin/unit')}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            
                                            @csrf
                                            <input hidden value="{{$unit->id}}" name="id">
                                            <button class="btn btn-flat" type="submit">
                                                <i class="fas fa-minus-circle text-danger"></i>
                                                Deletar
                                            </button>
                                        </form>
                                        <form action="{{url('/admin/unit')}}" method="post">
                                            <input type="hidden" name="_method" value="PUT">
                                            
                                            @csrf
                                            <input hidden value="{{$unit->id}}" name="id">
                                            <input hidden type="text" name="unit_name" class="unit_name">
                                            <button class="btn btn-flat" type="submit">
                                                <i class="fas fa-check-circle text-success"></i>
                                                Aceitar
                                            </button>
                                        </form>

                                        @isset($unit->list)
                                            
                                        <a class="btn btn-flat" href="{{url('/files/'.$unit->list)}}" target="_blank">
                                            <i class="fas fa-download text-muted"></i>
                                            Visualizar
                                        </a>
                                        @endisset
                                    </td>
                                    <td>
                                    <input type="text" value="{{ $unit->unit }}" class="form-control unit_name" >
                                    </td>
                                    <td>
                                        {{ $unit->city }}
                                        
                                    </td>
                                    <td>
                                        {{ $unit->initials }}
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('/js/dashboard.js')}}"></script>

@endsection