@extends('app');

@section('title', 'Settings -')

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
            <div class="card-header"><i class="fas fa-address-card mr-1"></i>Pagina Sobre</div>
            <div class="card-body">
                <form action="{{url('/admin/update_about_page')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="about_title">Título</label>
                        <input type="text" class="form-control" id="about_title"  name="about_title" required value="{{$about_title}}">
                    </div>

                    <div class="form-group">
                        <label for="about_text">Texto</label>
                        <textarea class="form-control" id="about_text" name="about_text" rows="22" required>{{$about_text}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>        
    </div>

    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-address-card mr-1"></i>Plataforma</div>
            <div class="card-body">
                <form action="{{url('/admin/update_platform')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="platform_name">Nome</label>
                        <input type="text" class="form-control" id="platform_name"  name="platform_name" required value="{{$app_name}}">
                    </div>

                    <div class="form-group">
                        <label for="embed">Index Embed (<span class="text-danger"><strong>Youtube</strong></span>)</label>
                        <input type="text" class="form-control" id="embed"  name="embed" required value="{{$platform->iframe_youtube}}">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="smtp_server">SMTP SERVER</label>
                        <input type="text" class="form-control" id="smtp_server"  name="smtp_server" required value="{{$platform->SMTP_SERVER}}">
                    </div>

                    <div class="form-group">
                        <label for="smtp_user_server">SMTP USER SERVER</label>
                        <input type="text" class="form-control" id="smtp_user_server"  name="smtp_user_server" required value="{{$platform->SMTP_USER_SERVER}}">
                    </div>

                    <div class="form-group">
                        <label for="smtp_pass_server">SMTP PASS SERVER</label>
                        <input type="password" class="form-control" id="smtp_pass_server"  name="smtp_pass_server" required value="{{$platform->SMTP_PASS_SERVER}}">
                    </div>

                    <div class="form-group">
                        <label for="smtp_port_server">SMTP PORT SERVER</label>
                        <input type="text" class="form-control" id="smtp_port_server"  name="smtp_port_server" required value="{{$platform->SMTP_PORT_SERVER}}">
                    </div>

                    <div class="form-group">
                        <label for="mail_encryption">SMTP ENCRYPTION SERVER</label>
                        <input type="text" class="form-control" id="mail_encryption"  name="mail_encryption" required value="{{$platform->MAIL_ENCRYPTION}}">
                    </div>

                    <div class="form-group">
                        <label for="smtp_from">SMTP FROM</label>
                        <input type="text" class="form-control" id="smtp_from"  name="smtp_from" required value="{{$platform->SMTP_FROM}}">
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
                    <p>Para obter o link de pagamento entre em <a href="https://www.mercadopago.com.br/tools/create" target="_blank">Mercado Pago Tool Create</a> logado com sua conta que ira receber o pagamento.</p>
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