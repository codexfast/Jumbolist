@extends('app');

@section('title', 'Users -')

@section('content')

<h1 class="mt-4">Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Users</li>
</ol>

<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-plus mr-1"></i>Usuários</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>E-mail</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>E-mail</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Telefone</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                     
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->state}}</td>
                                    <td>{{$user->phone}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = () => $(document.querySelectorAll('#dataTable')).DataTable();
</script>
@endsection