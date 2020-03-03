@extends('app');

@section('title', 'Settings - Jumbolist')

@section('content')

<h1 class="mt-4">Settings</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Settings</li>
</ol>

<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-envelope mr-1"></i>Configurações de E-mail e Nome</div>
            <div class="card-body">
                <form method="POST" action="{{url('/admin/profile')}}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="in_name">Nome</label>
                    <input type="text" class="form-control" id="in_name" aria-describedby="emailHelp" placeholder="Novo Nome" name="name" required value="{{$admin->name}}">
                    </div>
                    <div class="form-group">
                        <label for="in_email">E-mail</label>
                    <input type="email" class="form-control" id="in_email" aria-describedby="emailHelp" placeholder="Novo E-mail" name="email" required value="{{$admin->email}}">
                        <small id="emailHelp" class="form-text text-muted">Esta mudança afetará no login</small>
                    </div>
                    <div class="form-group">
                        <label for="in_password">Password</label>
                        <input type="password" class="form-control" id="in_password" placeholder="Confirme Senha" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-key mr-1"></i>Configurações
                de Senha</div>
            <div class="card-body">
                <form method="post" action="{{url('/admin/password')}}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="in_password">Antiga senha</label>
                        <input type="password" class="form-control" id="in_password"  name="old_password" required>
                    </div>

                    <div class="form-group">
                        <label for="in_repassword">Nova senha</label>
                        <input type="password" class="form-control" id="in_repassword"  name="new_password" required>
                    </div>

                    <div class="form-group">
                        <label for="in_repassword">Repita nova senha</label>
                        <input type="password" class="form-control" id="in_repassword"  name="new_password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-donate mr-1"></i>Adicinar links de Doações</div>
            <div class="card-body">
                <div class="alert alert-secondary" role="alert">
                    <h4 class="alert-heading">Simples explicação</h4>
                    <p>Para obter o link de pagamento entre em <a href="https://www.mercadopago.com.br/tools/create">Mercado Pago Tool Create</a> logado com sua conta que ira receber o pagamento.</p>
                    <hr>
                    <p class="mb-0">Ao entrar preencher os campos obrigatórios, o seguinte é abrir a seção <strong>Mais opções</strong> e preenchê-los com os dados abaixo  </p>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Pagamento aprovado</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{url('/thanks')}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Pagamento em processo</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{url('/thanks')}}">
                </div>

                <hr>

                <form method="POST" action="{{url('admin/donate/')}}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-link"></i>
                              </span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" placeholder="Link de pagamento" name="link"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Preço" name="amount">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Adcionar</button>
                    
                </form>
            </div>
        </div>        
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-hand-holding-usd mr-1"></i>Lista de links de Doações</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Valor</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            {{-- {{$donates}} --}}
                            @foreach ($donates as $donate)
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        R$ {{ str_replace('.', ',', $donate->amount) }}
                                        <form action="{{url('admin/donate/'.$donate->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-flat btn-danger" type="submit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
    <div class="col">
        <a class="btn btn-danger" href="{{url('/update/states-cities')}}"
            ><div class="sb-nav-link-icon"><i class="fas fa-retweet"></i></div>Atualizar Cidades e Estados </a>
    </div>
</div>
@endsection