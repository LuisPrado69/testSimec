<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>{{ trans('welcome.labels.first_game') }}</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th colspan="3">MARCADOR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Sheldon</td>
                            <td><span id="ptssheldon"/></td>
                        </tr>
                        <tr>
                            <td>{{ $player->alias }}</td>
                            <td><span id="ptstu"/></td>
                        </tr>
                        <tr>
                            <td>Ronda</td>
                            <td><span id="ronda"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-10">
                    <main>
                        <div>Elige tu move:</div>
                        <br>
                        <button id="stone"></button>
                        <button id="paper"></button>
                        <button id="scissors"></button>
                        <button id="lizard"></button>
                        <button id="spock"></button>
                        <br><br>
                    </main>
                </div>
                <div id="resultado" class="lightbox">
                    <span class="close">X</span>
                    <br><br>
                    <h1><span class="txtres"></span></h1>
                    <br>
                    <div class="marco">
                        <div id="sheldon"></div>
                        <div class="marcotxt">Sheldon</div>
                    </div>
                    <div class="marco">
                        <div id="player"></div>
                        <div class="marcotxt">Tú</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                </div>
                <div class="col-6">
                    <center>
                        {{ trans('welcome.labels.instructions') }}
                    </center>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-6">
                    <center>
                        {!! trans('welcome.labels.first_game_instructions') !!}
                    </center>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<script>
    $(document).ready(function () {

        const winner = "Has ganado a Sheldon!";
        const lost = "Ha ganado Sheldon!";
        const tie = "Empate!";

        let ronda = 0;
        let ptssheldon = 0;
        let ptstu = 0;
        let lbox = $(".lightbox");
        let sheldon = $('#sheldon');
        let player = $('#player');

        $("#ronda").html(ronda);
        $("#ptssheldon").html(ptssheldon);
        $("#ptstu").html(ptstu);
        function centrardiv() {
            let posx = ($(window).width() - lbox.outerWidth()) / 2;
            let posy = ($(window).height() - lbox.height()) / 2.5;
            lbox.css({left: +posx, top: +posy});
        }
        centrardiv();
        $(window).scroll(centrardiv());
        $(".fondo,.lightbox,.final").hide();
        $('button').click(function () {
            ronda++;
            $("#ronda").html(ronda);
            move(this);
            $(".fondo,.lightbox").css("visibility", "visible");
            $(".fondo,.lightbox").fadeIn("slow");

        });
        function gameOver() {
            let result;
            if (ronda == 10) {
                if (ptstu > ptssheldon) {
                    alert('HAS GANADO');
                    result = 1;
                } else if (ptstu < ptssheldon) {
                    alert('HAS PERDIDO');
                    result = 0;
                } else {
                    alert('HAS EMPATADO');
                    result = 1;
                }
            }
            $(".fondo,.lightbox").fadeOut("slow");
        }

        $('.lightbox,.close').click(function () {
            gameOver()
        });
        function resJugada(iconoPC, iconoJUG, res_img, restxt) {
            $("#ptssheldon").html(ptssheldon);
            $("#ptstu").html(ptstu);
            $(".imgsheldon").attr("src", res_img);
            $(".txtres").html(restxt);
            sheldon.css("background", "url('{{ asset('img/iconos.png') }}') " + iconoPC);
            player.css("background", "url('{{ asset('img/iconos.png') }}') " + iconoJUG);
        }
        function move(ele) {
            let plays = ["stone", "paper", "scissors", "lizard", "spock"];
            let pc_move = plays[Math.floor((Math.random() * 5))];
            switch (ele.id) {
                case 'stone':
                    switch (pc_move) {
                        case 'stone':
                            resJugada('508px', '508px', 'img/tie.png', tie);
                            break;
                        case 'paper':
                            ptssheldon++;
                            resJugada('649px', '508px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'scissors':
                            ptstu++;
                            resJugada('790px', '508px', 'img/pierdeSheldon.png', winner);
                            break;
                        case 'lizard':
                            ptstu++;
                            resJugada('366px', '508px', 'img/pierdeSheldon.png', winner);
                            break;
                        case 'spock':
                            ptssheldon++;
                            resJugada('223px', '508px', 'img/ganaSheldon.jpg', lost);
                            break;
                    }
                    break;
                case 'paper':
                    switch (pc_move) {
                        case 'stone':
                            ptstu++;
                            resJugada('508px', '649px', 'img/pierdeSheldon.png', winner);
                            break;
                        case 'paper':
                            resJugada('649px', '649px', 'img/tie.png', tie);
                            break;
                        case 'scissors':
                            ptssheldon++;
                            resJugada('790px', '649px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'lizard':
                            ptssheldon++;
                            resJugada('366px', '649px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'spock':
                            ptstu++;
                            resJugada('223px', '649px', 'img/pierdeSheldon.png', winner);
                            break;
                    }
                    break;
                case 'scissors':
                    switch (pc_move) {
                        case 'stone':
                            ptssheldon++;
                            resJugada('508px', '790px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'paper':
                            ptstu++;
                            resJugada('649px', '790px', 'img/pierdeSheldon.png', winner);

                            break;
                        case 'scissors':
                            resJugada('790px', '790px', 'img/tie.png', tie);

                            break;
                        case 'lizard':
                            ptstu++;
                            resJugada('366px', '790px', 'img/pierdeSheldon.png', winner);

                            break;
                        case 'spock':
                            ptssheldon++;
                            resJugada('223px', '790px', 'img/ganaSheldon.jpg', lost);
                            break;
                    }
                    break;
                case 'lizard':
                    switch (pc_move) {
                        case 'stone':
                            ptssheldon++;
                            resJugada('508px', '366px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'paper':
                            ptstu++;
                            resJugada('649px', '366px', 'img/pierdeSheldon.png', winner);
                            break;
                        case 'scissors':
                            ptssheldon++;
                            resJugada('790px', '366px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'lizard':
                            resJugada('366px', '366px', 'img/tie.png', tie);
                            break;
                        case 'spock':
                            ptstu++;
                            resJugada('223px', '366px', 'img/pierdeSheldon.png', winner);
                            break;
                    }
                    break;
                case 'spock':
                    switch (pc_move) {
                        case 'stone':
                            ptstu++;
                            resJugada('508px', '223px', 'img/pierdeSheldon.png', winner);
                            break;
                        case 'paper':
                            ptssheldon++;
                            resJugada('649px', '223px', 'img/pierdeSheldon.png', lost);
                            break;
                        case 'scissors':
                            ptstu++;
                            resJugada('790px', '223px', 'img/ganaSheldon.jpg', winner);
                            break;
                        case 'lizard':
                            ptssheldon++;
                            resJugada('366px', '223px', 'img/ganaSheldon.jpg', lost);
                            break;
                        case 'spock':
                            resJugada('223px', '223px', 'img/tie.png', tie);
                            break;
                    }
                    break;
            }
        }
    });
</script>

<style>

    button {
        width: 137px;
        height: 135px;
        border-radius: 80px;
        box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.4);
        border: none;
        margin: 0px 10px 0px 8px;
    }

    div main button:hover {
        transform: rotate(20deg);
        filter: grayscale(0%);
        cursor: pointer;
    }

    div main button:active {
        box-shadow: 1px 1px 1px #ccc;
        transform: translateY(5px);
        cursor: move;
    }

    #sheldon, #player {
        width: 131px;
        background-color: red;
        height: 132px;
        border-radius: 100px;
        box-shadow: 3px 3px 3px #ccc;
        margin: 10px auto;
    }

    #stone {
        background: url({{ asset('img/iconos.png') }}) 512px;
        background-color: #ff8080;
    }

    #paper {
        background: url({{ asset('img/iconos.png') }}) 652px;
        background-color: #ffdd55;
    }

    #scissors {
        background: url({{ asset('img/iconos.png') }}) 794px;
        background-color: #e580ff;
    }

    #lizard {
        background: url({{ asset('img/iconos.png') }}) 370px;
        background-color: #87de87;
    }

    #spock {
        background: url({{ asset('img/iconos.png') }}) 227px;
        background-color: #80b3ff;
    }


    /*Modal*/
    @media screen and (max-width: 768px) {

        main, .instructions {
            width: 85%;
        }
        .puntos span {
            padding: 0;
        }
    }

    .lightbox {
        background: linear-gradient(lightblue, white);
        border: 10px solid #80b3ff;
        border-top-left-radius: 10%;
        border-bottom-right-radius: 10%;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
        width: 500px;
        height: auto;
        position: absolute;
        opacity: none;
        z-index: 3;
        text-align: center;
        visibility: hidden;
    }

    .close {
        float: right;
        top: 0px;
        margin: 10px 10px 0px 0px;
        font-size: 20px;
        font-weight: bold;
        font-family: "Arial";
        cursor: pointer;
        background-color: red;
        border-radius: 50%;
        padding: 5px;
        color: white;
    }

    @media screen and (max-width: 768px) {
        .lightbox {
            border-radius: 0;
            border: 5px solid #80b3ff;
            width: 92%;
            top: 5px !important;
            margin: 40px auto;
            outline-offset: 0;
        }
    }
</style>
