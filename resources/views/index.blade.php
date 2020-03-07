
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('title') - {{$app_name}}</title>

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
  <body class="bg-light pt-5 mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('')}}">
          <img src="{{url('/favicon.ico')}}"  width="16" height="16">
          {{$app_name}}
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            @if ($uri == '')
            <a class="nav-link active" href="{{url('')}}">Inicial</a>
            @else
            <a class="nav-link" href="{{url('')}}">Inicial</a>
            @endif
          </li>
          <li class="nav-item">
            @if ($uri == 'buscar')
            <a class="nav-link active" href="{{url('/buscar')}}">Buscar</a>
            @else
            <a class="nav-link" href="{{url('/buscar')}}">Buscar</a>

            @endif
          </li>
          <li class="nav-item">
            @if ($uri == 'contribuir')
            <a class="nav-link active" href="{{url('/contribuir')}}">Contribuir</a>
            @else
            <a class="nav-link" href="{{url('/contribuir')}}">Contribuir</a>

            @endif
          </li>
          <li class="nav-item">
            @if ($uri == 'doacoes')
            <a class="nav-link active" href="{{url('/doacoes')}}">Doações</a>
            @else
            <a class="nav-link" href="{{url('/doacoes')}}">Doações</a>
            @endif

          </li>
          <li class="nav-item">
            @if ($uri == 'sobre')
            <a class="nav-link active" href="{{url('/sobre')}}">Sobre</a>
            @else
            <a class="nav-link" href="{{url('/sobre')}}">Sobre</a>
            @endif
          </li>
        </ul>
      </div>
      </div>
    </nav>

    @yield('content')
    <footer class="my-4 pt-4 text-muted text-center text-small">
      <p class="mb-1">&copy; <?= date("Y"); ?> {{$app_name}} - <a href="mailto:{{$email}}" class="text-muted" target="_top">{{$email}}</a></p>
    </footer>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script src="{{url('/js/main.js')}}"></script>
  <script src="{{url('/js/fix-custom-select-input.js')}}"></script>

  </body>
</html>
