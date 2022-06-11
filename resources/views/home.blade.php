<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'Indicons') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="indicons/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="indicons/css/styles.css" rel="stylesheet" />
    <link href="indicons/css/style.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('layouts.indicons.header')

    @include('layouts.indicons.navigation')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="indicons/images/banner.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>XIX WORLD CONGRESS OF PHLEBOLOGY</h5>
                    <p>12-16 September 2022 </p>
                    <span>Istanbul, Turkey </span>
                </div>
            </div>
            <div class="carousel-item">
                <img src="indicons/images/banner.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>XIX WORLD CONGRESS OF PHLEBOLOGY</h5>
                    <p>12-16 September 2022 </p>
                    <span>Istanbul, Turkey </span>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="indicons/images/banner.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>XIX WORLD CONGRESS OF PHLEBOLOGY</h5>
                <p>12-16 September 2022 </p>
                <span>Istanbul, Turkey </span>
            </div>
        </div>
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <div class="top-box">
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <a href="#" class="top-box-main">
                        <img src="indicons/images/im4.png">
                        <h2> ACCOMMODATION </h2>
                    </a>
                </div>

                <div class="col-md-3">
                    <div class="top-box-main">
                        <img src="indicons/images/im1.png">
                        <h2> PROGRAM </h2>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="top-box-main">
                        <img src="indicons/images/im2.png">
                        <h2> SPEAKERS </h2>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="top-box-main">
                        <img src="indicons/images/im3.png">
                        <h2> TRAVEL TO TURKEY </h2>
                    </div>
                </div>
            </div>
        </div>


        <div style="clear:both;"></div>


        <div class="top-box-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="top-box-bottom-main">
                            <div class="top-bpx-bottom-img"><img src="indicons/images/Mask1.png"> </div>
                            <h3>UIP President </h3>

                            <p>
                                Dear Friends,<br>


                                It is my great pleasure as the President of the UIP to invite you to the 2022 UIP World Congress of Phlebology (12-16 Sep 2022).<br>


                                With more than 70 member societies from across 5 continents, UIP is the peak body representing phlebology on a global level...
                                <br>

                                <a href="#"> read more </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="top-box-bottom-main">
                            <div class="top-bpx-bottom-img"><img src="indicons/images/Mask2.png"> </div>
                            <h3>UIP President </h3>

                            <p>
                                Dear Friends,<br>


                                It is my great pleasure as the President of the UIP to invite you to the 2022 UIP World Congress of Phlebology (12-16 Sep 2022).<br>


                                With more than 70 member societies from across 5 continents, UIP is the peak body representing phlebology on a global level...
                                <br>

                                <a href="#"> read more </a>
                        </div>

                    </div>
                </div>


            </div>

        </div>


    </div>
    <div class="box-bottom-main">
        <div class="box-bottom">

            <div class="container">

                <h2>Istanbul Tourism Guide </h2>
                <p>Welcome to Istanbul, the city of the past, the present and the future. Istanbul not only joins continents, it also joins cultures and people. Close your eyes and imagine yourself in a city; the mysticism of the East and the modernity of the West, the constant time travel between past and the future, the balance of the traditional and the contemporary. </p>

                <a href="#">Read More </a>
            </div>

        </div>

        <div class="box-bottom_a">

            <div class="container">

                <div class="box-bottom-a-box">
                    <div class="row">

                        <div class="col-md-6">
                            <img style="height:50px;" src="indicons/images/ic9.png">
                            <h3>ORGANIZATION SECRETARIAT </h3>
                            <p>Yazarlar Sok. No:16 Esentepe Mah. Sisli,
                                34394, Istanbul </p>

                            <p> <img src="indicons/images/ic7.png"> +90 212 279 00 20 </p>
                            <p> <img src="indicons/images/ic1.png"> +90 212 279 00 35 </p>
                            <p> <img src="indicons/images/ic2.png"> uip2022@soloevent.net </p>

                        </div>

                        <div class="col-md-6">
                            <img style="height:50px;" src="indicons/images/ic8.png">
                            <h3>VENUE INFORMATION </h3>
                            <p>Istanbul Convention Exhibition Center - ICEC, Gümüş Cad. No:4 34367,<br>
                                Harbiye / İstanbul / Türkiye</p>

                            <p> <img src="indicons/images/ic7.png"> +90 212 373 11 00
                            </p>
                            <p> <img src="indicons/images/ic1.png"> +90 212 224 08 78
                            </p>
                            <p> <img src="indicons/images/ic2.png"> www.icec.org/home-page </p>
                            <p> <img src="indicons/images/pin.png"> Click here for map </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-bottom-last">
            <div class="container">

                <div class="row">
                    <div class="col-md-1"> </div>
                    <div class="col-md-3">
                        <ul>
                            <li> <a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Congress </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Information </a> </li>
                            <li> <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Scientific </a> </li>
                            <li> <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Abstracts </a> </li>
                            <li> <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Late Abstracts </a> </li>
                            <li> <a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    Registration </a> </li>
                        </ul>

                    </div>


                    <div class="col-md-3">
                        <ul>
                            <li> <a href="#">Accommodation </a> </li>
                            <li> <a href="#"> Travel </a> </li>
                            <li> <a href="#"> UIP </a> </li>
                            <li> <a href="#"> Sponsorship </a> </li>
                            <li> <a href="#"> Press </a> </li>
                            <li> <a href="#"> Contact </a> </li>
                        </ul>

                    </div>

                </div>

                <div style="clear:both;"></div>
                <p>© UIP 2022 World Congress of Phlebology All rights reserved. </p>

            </div>
        </div>

    </div>

    @include('layouts.indicons.scripts')
</body>

</html>
