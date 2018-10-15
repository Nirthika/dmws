@extends('layouts.app')

<!-- @section('title')
    {{ 'Dengue Monitoring and Warning System' }}
@endsection -->

@section('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <!-- Slider Section -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= asset('images/slide1.jpg') ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= asset('images/slide2.jpg') ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= asset('images/slide3.jpg') ?>" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= asset('images/slide4.jpg') ?>" alt="Forth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= asset('images/slide5.jpg') ?>" alt="Fifth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Slider Section -->
    <br/>

    <!-- Feature Section -->
    <div class="card-deck">
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?= asset('images/2officers.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Officers</h5>
                <p class="card-text">Notification officers in dengue survilance.</p>                        
            </div>
            <div class="card-footer">
              <a href="#" class="more">More</a>
            </div>                   
        </div>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?= asset('images/2communication.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Informing</h5>
                <p class="card-text">Information Sharing to relevent authorities.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="more">More</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?= asset('images/2monitor.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Monitoring</h5>
                <p class="card-text">Monitor the dengue transformation.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="more">More</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?= asset('images/2alert.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Alerting</h5>
                <p class="card-text">Alert on dengue survilance.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="more">More</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?= asset('images/2modelling.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Modelling</h5>
                <p class="card-text">Modelling for dengue survilance.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="more">More</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="<?= asset('images/2labTest.png') ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Testing</h5>
                <p class="card-text">Varification details from laboratory.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="more">More</a>
            </div>
        </div>
    </div>
    <!-- Feature Section -->

    <br/><br/>
    <!-- About Us Section -->
    <section id="aboutUs" style="padding: 0% 5%;">
        <h3 style="color: #330080; font-weight: bold; text-align: center;">About Us</h3>
        <div class="d-flex align-content-center">
            <div class="p-2 bd-highlight">
                <img src="<?= asset('images/aboutus1.png') ?>" alt="" width="100%">
            </div>
            <div class="p-2 bd-highlight" style="margin-left: 3%; margin-top: 2%">
                <!-- <br/> -->
                <p style="text-align: justify;"> 
                    The National Dengue Control Unit is the focal point for the national dengue control programme in Ministry of Health, Sri Lanka. It was established in year 2005 as a decision taken by the Ministry of Health following the major DF/DHF outbreak in year 2004. It is responsible for the coordination of dengue control / prevention activities with different stakeholders.
                </p><br/>
                <a href="#" class="more">Read More</a>
            </div>
        </div>
    </section>
    <!-- About Us Section -->
    
    <br/>
    <!-- Contact Us Section -->
    <section id="contactUs">
        <h3 style="color: #330080; font-weight: bold; text-align: center;">Contact Us</h3><br/>
        <div class="row">
            <div class="col-md-6" style="padding: 0%;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3932.95530886328!2d80.01985261479163!3d9.684855593067695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3afe5413b6aaaa91%3A0x434111cf1150e06b!2sUniversity+of+Jaffna%2C+Sir.+Pon+Ramanathan+Road%2C+Thirunelvelly%2C%2C+Jaffna+40000!3m2!1d9.684855599999999!2d80.0220413!5e0!3m2!1sen!2slk!4v1537250319458" width="100%" height= "400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3" style="background-color: #d9d9d9;">
                <br/><h5 style="color: #330080; font-weight: bold; text-align: left;">Contact Information</h5><br/>
                <i class="fa fa-map-marker"></i>&emsp;Address: Sir. Pon Ramanathan Road, <br/> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Thirunelvelly, Jaffna 40000<br/><br/>
                <i class="fa fa-phone"></i>&emsp;Phone: &emsp;(+94) 021 221 8100<br/><br/>
                <i class="fa fa-envelope"></i>&emsp;Email: &emsp;info@univ.jfn.ac.lk    
            </div>
            <div class="col-md-3" style="background-color: #e6e6e6;">
                <br/><h5 style="color: #330080; font-weight: bold; text-align: left;">Leave Us a Message</h5><br/>
                <form>
                    @csrf
                    <input type="text" placeholder="Name" name="name" required><br/><br/>
                    <input type="email" placeholder="Email" name="email" required><br/><br/>
                    <input type="text" placeholder="### #######" name="phoneNo" required ><br/><br/>
                    <textarea name="message" id="message" cols="35" rows="5" placeholder="Message"></textarea><br/>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Contact Us Section -->
    <br/>

</div>
@endsection
