<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Voting</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
            <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"
                integrity="sha256-fDncdclXlALqR3HOO34OGHxek91q8ApmD3gGldM+Rng=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"
                integrity="sha256-4OK8Th0+5QJMThqlimytmqQvxjqMic4YATocjyuUh1w=" crossorigin="anonymous"></script>



    <style>
        html {
        scroll-behavior: smooth;
        }

        .calon,
        .pemilih,
        .hasil, {
        background-position: center center;
        background-repeat: no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }

        .calon {
        background-color: #ECECEC;
        margin-top: 10px;
        padding-bottom: 10px;
        }

        .pemilih {
        background-color: #E1E1E1;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-bottom: 10px;
        }

        .hasil {
        background-color: #D1D1D1;
        margin-bottom: 10px;
        padding-bottom: 10px;
        }
        .card-img-top {
        display: block;
        width: 100%;
        height: 350px;
        padding: 8px;
        }
        h4 {
        font-size: 3.28571429em;
        font-weight: 700;
        line-height: 1.2857em;
        margin: 0;
        }
        hr{
            border: 1px solid;
        }
        .card{
            margin: 10px;
        }
        #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: #4287f5; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 15px; /* Some padding */
        border-radius: 10px; /* Rounded corners */
        font-size: 18px; /* Increase font size */
        }

        #myBtn:hover {
        background-color: #555; /* Add a dark-grey background on hover */
        }

    </style>
</head>
<body>
<!--Navbar-->
<header class="">
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <img src="{{ asset('img/election.png') }}" style="padding:5px" alt="">
    <a class="navbar-brand" href="#">E-Vote</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" style="margin-left: 30px;" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#calon">Calon
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pemilih">Pemilih</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#hasil">Hasil Vote</a>
            </li>

            <!-- Dropdown -->

        </ul>
        <!-- Links -->

    </div>
    <!-- Collapsible content -->

</nav>
</header>
<section id="calon" class="calon">

    <div class="container text-center">
        <h4 class="text-bold">Daftar Calon</h4>
        <div class="row">
            @foreach ($calon as $item)
            <div class="col-sm-12 col-md-8 col-lg-6 mt-12">
                <div class="card">
                    <img class="card-img-top" src="{{ $item->foto }}">
                    <div class="card-block primary-color">
                        <h4 class="text-bold">{{ $item->nama }}</h4>
                    </div>
                    <small class="lead">Visi :</small>
                    <blockquote>"{{ $item->visi }}"</blockquote>
                    <hr>
                    <small class="lead">Misi :</small>
                    <blockquote>"{{ $item->misi }}"</blockquote>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>

<!-- Section 1 End -->

<!-- Section 2 -->

<section class="pemilih" id="pemilih">
    <div class="container">
        <h4 class="text-center">Pemilih</h4>
        {!! $chart->html() !!}
        <p class="text-center lead">Jumlah Pemilih: {{ $pemilih }}</p>
        <h5 class="text-center">Presentasi Laki-Laki / Perempuan:</h5>
        <h5 class="text-center">{{ $pemilihl}}/{{ $pemilihp }}</h5>
    </div>
</section>

<!-- Section 2 End -->

<!-- Section 3 -->

<section class="hasil" id="hasil">
<div class="container">
    <h4 class="text-center">Hasil Vote</h4>
    {!! $vote->html() !!}
    <p class="text-center lead">Jumlah Suara Masuk: {{ $hasil }}</p>
</div>


</section>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button>

<!-- Section 3 End -->






</body>
<script>

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
    } else {
    document.getElementById("myBtn").style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
    function autoRefreshPage()
    {
    window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 60000);
</script>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
{!! $vote->script() !!}
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js">
</script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>
</html>
