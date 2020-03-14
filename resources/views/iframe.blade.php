
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{$app_name}}</title>

    <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

  <script>
    let states_cities = <?= isset($states_cities) ? $states_cities : 'null' ?>;
    let states_cities_with_unit = <?= isset($states_cities_with_unit) ? $states_cities_with_unit : 'null' ?>;
</script>

<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .Montserrat {
        font-family: 'Montserrat', sans-serif;
      }
    </style>

  </head>
  <body class="bg-light pt-5 mt-1">
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
        <div class="col-md-12 order-md-1">
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
    
          
        </div>

    
      </div>

      {{-- Modal --}}
      <!-- Button trigger modal -->

      <hr>
      <div class="d-flex justify-content-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Receber Atualizações
      </button>
      </div>

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
        <div class="input-group flex-nowrap mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"> <i class="fas fa-phone-square-alt"></i> </span>
          </div>
          <input type="tel" class="form-control" placeholder="Telefone" aria-label="Telefone" aria-describedby="addon-wrapping" required name="phone">
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script src="{{url('/js/main.js')}}"></script>
  <script src="{{url('/js/fix-custom-select-input.js')}}"></script>

  </body>
</html>
