@extends('index')

@section('title', 'Sobre')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 py-3">
            <h4 class="text-center Montserrat">{{$about_title}}</h4>
            <div class="d-flex justify-content-center">
                <div class="border rounded-pill" style="width: 100px; border-color: #f45 !important;"></div>
            </div>
        </div>

        <div class="col-sm-12 py-3 px-5 my-2">
            <p>
                <?= $about_text?>
            </p>
        </div>

        <div class="col-sm-12 py-3 px-5 mt-5">
            <h4 class="text-center Montserrat">Alguma duvida? faça contato</h4>
            <div class="d-flex justify-content-center">
                <a class="btn btn-secondary m-3" href="mailto:{{$email}}?Subject=Duvida!" target="_top">
                    Contato
                </a>
            </div>
        </div>
    </div>
</div>
@endsection