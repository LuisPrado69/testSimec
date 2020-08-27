<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
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
<body>
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>{{ trans('welcome.title') }}</h1>
            <p class="lead text-muted">{{ trans('welcome.labels.created_by') }}</p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <img src="{{ asset('gamepad.png') }}" height="100%" width="100%" style="margin-top: -200px"/>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">{{ trans('welcome.labels.first_game') }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('first_game.show_modal') }}" class="btn btn-sm btn-outline-secondary">{{ trans('welcome.labels.game') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <img src="{{ asset('gamepad.png') }}" height="100%" width="100%" style="margin-top: -200px"/>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">{{ trans('welcome.labels.second_game') }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('second_game.show_modal') }}" class="btn btn-sm btn-outline-secondary">{{ trans('welcome.labels.game') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>
