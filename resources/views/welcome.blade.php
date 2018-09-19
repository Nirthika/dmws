@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dengue Monitoring and Warning System</title>
        <link rel="shortcut icon" href="images/logoNoBackground.png"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Image Slider-->
            <!-- <link href="slider/js-image-slider.css" rel="stylesheet" type="text/css" /> -->
            <!-- <script src="slider/mcVideoPlugin.js" type="text/javascript"></script> -->
            <!-- <script src="slider/js-image-slider.js" type="text/javascript"></script> -->
        <!-- Image Slider-->      
    </head>
    <body>
        @section('content')
        <div class="container">
            <!-- <div id="sliderFrame"> -->
                <!-- <div id="slider"> -->
                    <img src="<?= asset('images/slide2.jpg') ?>" alt="" width="100%">
                <!-- </div> -->
            <!-- </div> -->
            <br/><br/>

            <!-- Features Section -->
            <section id="features">
                <div id="nav-horizontal" class="featured">
                    <span id="space"></span>
                    <span id="listItem">
                        <h3>Officers</h3>
                        <div>
                            <p>Notification officers including in dengue survilance.</p>
                            <a href="#" class="more">more</a>
                        </div>
                        <img src="<?= asset('images/2officers.png') ?>" alt=""></span>
                    <span id="space"></span>
                    <span id="listItem">
                        <h3>Informing</h3>
                        <div>
                            <p>Information Sharing to relevent authorities.</p>
                            <a href="#" class="more">more</a>
                        </div>
                        <img src="<?= asset('images/2communication.png') ?>" alt=""></span>
                    <span id="space"></span>
                    <span id="listItem">
                        <h3>Monitoring</h3>
                        <div>
                            <p>Monitor the dengue transformation.</p>
                            <a href="#" class="more">more</a>
                        </div>
                        <img src="<?= asset('images/2monitor.png') ?>" alt=""></span>
                    <span id="space"></span>
                    <span id="listItem">
                        <h3>Alerting</h3>
                        <div>
                            <p>Alert on dengue survilance.</p>
                            <a href="#" class="more">more</a>
                        </div>
                        <img src="<?= asset('images/2alert.png') ?>" alt=""></span>
                    <span id="space"></span>
                    <span id="listItem">
                        <h3>Modelling</h3>
                        <div>
                            <p>Modelling for dengue survilance.</p>
                            <a href="#" class="more">more</a>
                        </div>
                        <img src="<?= asset('images/2modelling.png') ?>" alt=""></span>
                    <span id="space"></span>
                    <span id="listItem">
                        <h3>Testing</h3>
                        <div>
                            <p>Varification details from laboratory.</p>
                            <a href="#" class="more">more</a>
                        </div>
                        <img src="<?= asset('images/2labTest.png') ?>" alt=""></span>
                    <span id="space"></span>
                </div>
            </section><br/>

            <!-- AboutUs Section -->
            <section id="aboutUs">
                <div id="nav-horizontal" class="about">
                    <h3 style="color: #330080; font-weight: bold; text-align: center;">About Us</h3>
                    <div id="nav-content">
                        <img src="<?= asset('images/aboutus1.png') ?>" alt="" width="40%" height="60%">
                        <span style="display: inline-block; width: 10%"></span>
                        <span style="padding: 5% 0%;">
                            <p style="text-align: justify;"> 
                                The National Dengue Control Unit is the focal point for the national dengue control programme in Ministry of Health, Sri Lanka. It was established in year 2005 as a decision taken by the Ministry of Health following the major DF/DHF outbreak in year 2004. It is responsible for the coordination of dengue control / prevention activities with different stakeholders.
                            </p><br/>
                            <a href="#" class="btn-read-more">Read More</a>
                        </span>
                    </div>
                </div>
            </section><br/>

            <!-- ContactUs Section -->
            <section id="contactUs">
                <div id="nav-horizontal" class="contact">
                    <h3 style="color: #330080; font-weight: bold; text-align: center;">Contact Us</h3><br/>
                    <div id="nav-content">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3932.95530886328!2d80.01985261479163!3d9.684855593067695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3afe5413b6aaaa91%3A0x434111cf1150e06b!2sUniversity+of+Jaffna%2C+Sir.+Pon+Ramanathan+Road%2C+Thirunelvelly%2C%2C+Jaffna+40000!3m2!1d9.684855599999999!2d80.0220413!5e0!3m2!1sen!2slk!4v1537250319458" width="50%" height= "400" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <span style="display: inline-block; width: 2%; background-color: #00bfff;"></span>
                            <span style="display: inline-block; width: 25%; background-color: #00bfff;">
                                <br/><h5 style="color: #330080; font-weight: bold; text-align: left;">Contact Information</h5><br/>
                                <b>
                                    <i class="fa fa-map-marker"></i>&emsp;Address: Sir. Pon Ramanathan Road, <br/> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Thirunelvelly, Jaffna 40000<br/><br/>
                                    <i class="fa fa-phone"></i>&emsp;Phone: &emsp;(+94) 021 221 8100<br/><br/>
                                    <i class="fa fa-envelope"></i>&emsp;Email: &emsp;info@univ.jfn.ac.lk
                                </b>
                            </span>
                            <span style="display: inline-block; width: 3%; background-color: #00bfff;"></span>
                            <span style="display: inline-block; width: 25%; background-color: #00bfff;">
                                    <br/><h5 style="color: #330080; font-weight: bold; text-align: left;">Leave Us a Message</h5><br/>
                                    <form>
                                        @csrf
                                        <input type="text" placeholder="Name" name="name" required autofocus><br/><br/>
                                        <input type="email" placeholder="Email" name="email" required autofocus><br/><br/>
                                        <input type="text" placeholder="### #######" name="phoneNo" required autofocus ><br/><br/>
                                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea><br/>
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </form>
                            </span>
                    </div>
                </div>
            </section>
        </div>
        @endsection
    </body>
</html>
