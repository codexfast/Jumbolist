
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Lista de Jumbos Online</title>

    <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    </style>

  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{url('/favicon.ico')}}"  width="16" height="16">
          Jumbolist
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('')}}">Inicial <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">Sobre</a>
          </li>

        </ul>
      </div>
      </div>
    </nav>
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="{{url('/logo.png')}}" alt="" width="72" height="72">
    <h2>Jumbolist</h2>
    <p class="lead">Dificuldades em obter lista de materiais para unidades prisionais? busque aqui na maior plataforma de lista de jumbo, você tambem pode ajudar mandado listas ou fazendo doações</p>
  </div>

  <div class="row">
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Buscar lista</h4>
      <form class="" novalidate>
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
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
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
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <button class="btn btn-block btn-dark">
            <i class="fas fa-search"></i>
            Buscar
          </button>
        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-list"></i>
            Listas
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <i class="fas fa-file text-muted mr-1"></i>
              <a href="">13/11/1998 23:12:32</a>
            </li>

          </ul>
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
  

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; <?= date("Y"); ?> Jumbolist</p>
  </footer>
</div>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="{{url('/js/main.js')}}"></script>

  </body>
</html>
