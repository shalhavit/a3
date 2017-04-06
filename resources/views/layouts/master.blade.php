<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @yield('title', 'Twitter Inspector')
        </title>

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../public/css/custom.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>

    <body id="home">
        <div class="content row">
            <div class="content row">
                <div class="col-lg-12">
                    <header class="clearfix">
                        <section class="text-center" id="a1header">
                            <h1>Tweeter inspector 2</h1>
                        </section>
                    </header>  <!-- header -->
                </div>
            </div>
        </div> <!-- header -->

        <section class="container">
            <div id="content" class="row">

                {{-- <section id="main" class="col col-lg-12">
                <h2 class="text-center">Last Tweets timeline</h2>
                <div class="row"> --}}
                        @yield('content')
                {{-- </div>
                </section> --}}

            </div>

            <div class="footer-copyright">
                <div class="text-center container-fluid">
                    © 2017 :: <a href="http://a3.shalhavit.com"> Assignment 3</a>
                </div>
            </div> <!-- Copyright-->

        </section>

        <!-- Latest compiled and minified JavaScript -->
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    </body>
</html>
