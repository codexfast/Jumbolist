@extends('app');

@section('title', 'Banners -')

@section('content')

<h1 class="mt-4">Banners</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Banners</li>
</ol>

<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-plus mr-1"></i>Adicione banner</div>
            <div class="card-body">
                <form method="POST" action="{{url('/admin/add-banner')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">
                              <i class="fas fa-images"></i>
                          </span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="banner">
                          <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-images mr-1"></i>Lista de Banners</div>
            <div class="card-body">

                @foreach ($banners as $banner)
                    
                <div class="card mb-3">
                    <img src="{{url('/banners/' . $banner->banner)}}" class="card-img-top" alt="{{$banner->banner}}">
                    <div class="card-body">
                      <h5 class="card-title">Banner #{{$loop->index + 1}}</h5>
                      <a href="{{url('/admin/remove-banner/' . $banner->id)}}" class="btn btn-danger">Deletar</a>
                    </div>
                  </div>
                @endforeach

            </div>
        </div>
@endsection