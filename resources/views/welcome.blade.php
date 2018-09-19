@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dengue Monitoring and Warning System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @section('content')
        <div class="container">
            
            <div id="myCarousel" class="carousel slide"> <!-- slider -->
                <div class="carousel-inner">
                    <div class="active item"> <!-- item 1 -->
                        <img src="<?= asset('images/slide1.png') ?>" alt="">
                    </div> <!-- end item -->
                    <div class="item"> <!-- item 2 -->
                        <img src="<?= asset('images/slide2.png') ?>" alt="">
                    </div> <!-- end item -->
                    <div class="item"> <!-- item 3 -->
                        <img src="<?= asset('images/slide3.png') ?>" alt="">
                    </div> <!-- end item -->
                    <div class="item"> <!-- item 4 -->
                        <img src="<?= asset('images/slide4.png') ?>" alt="">
                    </div> <!-- end item -->
                    <div class="item"> <!-- item 5 -->
                        <img src="<?= asset('images/slide5.png') ?>" alt="">
                    </div> <!-- end item -->
                </div> <!-- end carousel inner -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div> <!-- end slider -->
        </div>
        @endsection
    </body>
</html>
