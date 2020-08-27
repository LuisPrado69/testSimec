<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<main role="main">
    @if(isset($errorMsg))
        <div class="alert alert-danger">
            {{ $errorMsg }}
        </div>
    @endif
    <section class="jumbotron text-center">
        <div class="container">
            <h1>{{ trans('welcome.labels.first_game') }}</h1>
        </div>
    </section>
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <div class="info-form">
                            <form action="{{ route('first_game.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="game" value="first_game">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Registra tu alias para ingresar al juego:</strong>
                                            <input type="text" name="alias" class="form-control" placeholder="Alias" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Jugar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
