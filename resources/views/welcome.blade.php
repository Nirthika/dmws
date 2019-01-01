@extends('layouts.app')

<!-- @section('title')
    {{ 'Dengue Monitoring and Warning System' }}
@endsection -->

@section('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<div class="container">
    <!-- Slider Section -->
    <section id="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" height="360rem" src="<?= asset('images/slide1.jpg') ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" height="360rem" src="<?= asset('images/slide2.jpg') ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" height="360rem" src="<?= asset('images/slide3.jpg') ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #000000"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #000000"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- Slider Section -->
    <br/>

    <!-- Feature Section -->
    <section id="feature">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="<?= asset('images/1officers.jpg') ?>" alt="Card image cap" style="background-color: #e6f2ff;">
                <div class="card-body" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-weight: bold;">Officers</h5>
                    <p class="card-text">Notification officers in dengue surveillance.</p>                        
                </div>
                <div class="card-footer" style="padding: 0.3rem 1.0rem;">
                  <a href="{{ url('/officers') }}" class="more">More...</a>
                </div>                   
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= asset('images/1communication.png') ?>" alt="Card image cap" style="background-color: #e6f2ff;">
                <div class="card-body" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-weight: bold;">Informing</h5>
                    <p class="card-text">Information Sharing to relevant authorities.</p>
                </div>
                <div class="card-footer" style="padding: 0.3rem 1.0rem;">
                  <a href="{{ url('/informing') }}" class="more">More...</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= asset('images/1monitor.png') ?>" alt="Card image cap" style="background-color: #e6f2ff;">
                <div class="card-body" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-weight: bold;">Monitoring</h5>
                    <p class="card-text">Monitor the dengue transformation.</p>
                </div>
                <div class="card-footer" style="padding: 0.3rem 1.0rem;">
                  <a href="#" class="more">More...</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= asset('images/1alert.png') ?>" alt="Card image cap" style="background-color: #e6f2ff;">
                <div class="card-body" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-weight: bold;">Alerting</h5>
                    <p class="card-text">Alert on dengue surveillance.</p>
                </div>
                <div class="card-footer" style="padding: 0.3rem 1.0rem;">
                  <a href="{{ url('/alerting') }}" class="more">More...</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= asset('images/1modelling.png') ?>" alt="Card image cap" style="background-color: #e6f2ff;">
                <div class="card-body" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-weight: bold;">Modelling</h5>
                    <p class="card-text">Modelling for dengue surveillance.</p>
                </div>
                <div class="card-footer" style="padding: 0.3rem 1.0rem;">
                  <a href="#" class="more">More...</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= asset('images/1labTest.png') ?>" alt="Card image cap" style="background-color: #e6f2ff;">
                <div class="card-body" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-weight: bold;">Testing</h5>
                    <p class="card-text">Verification details from laboratory.</p>
                </div>
                <div class="card-footer" style="padding: 0.3rem 1.0rem;">
                  <a href="#" class="more">More...</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section -->

    <br/><br/>
    <!-- About Us Section -->
    <section id="aboutUs" style="padding: 0% 5%;">
        <h3 style="color: #330080; font-weight: bold; text-align: center;">About Us</h3>
        <div class="d-flex align-content-center">
            <div class="row">
            <div class="col-md-4">
            <!-- <div class="p-2 bd-highlight"> -->
                <img src="<?= asset('images/aboutus.png') ?>" alt="" width="100%">
            <!-- </div> -->
            </div>
            <div class="col-md-8" style="margin: auto;">
            <!-- <div class="p-2 bd-highlight" style="margin-left: 3%; margin-top: 2%"> -->
                <p style="text-align: justify;"> 
                    The National Dengue Control Unit is the focal point for the national dengue control programme in Ministry of Health, Sri Lanka. It was established in year 2005 as a decision taken by the Ministry of Health following the major DF/DHF outbreak in year 2004. It is responsible for the coordination of dengue control / prevention activities with different stakeholders.
                </p>
                <a href="#" class="more">Read More</a>
            <!-- </div> -->
            </div>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3932.95530886328!2d80.01985261479163!3d9.684855593067695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3afe5413b6aaaa91%3A0x434111cf1150e06b!2sUniversity+of+Jaffna%2C+Sir.+Pon+Ramanathan+Road%2C+Thirunelvelly%2C%2C+Jaffna+40000!3m2!1d9.684855599999999!2d80.0220413!5e0!3m2!1sen!2slk!4v1537250319458" width="100%" height= "100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3" style="background-color: #d9d9d9;">
                <br/><h5 style="color: #330080; font-weight: bold; text-align: center;">Contact Information</h5><br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><i class="fa fa-map-marker"></i></td>
                                <td>Address:</td>
                                <td>Sir. Pon Ramanathan Road, Thirunelvelly, Jaffna 40000</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-phone"></i></i></td>
                                <td>Phone:</td>
                                <td>(+94) 021 221 8100</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-envelope"></i></td>
                                <td>Email:</td>
                                <td>info@univ.jfn.ac.lk</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3" style="background-color: #e6e6e6;">
                <br/><h5 style="color: #330080; font-weight: bold; text-align: center;">Leave Us a Message</h5><br/>
                <form method="POST" action="#" style="margin-left: 2%; margin-right: 2%">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="phoneNo" type="text" class="form-control{{ $errors->has('phoneNo') ? ' is-invalid' : '' }}" placeholder="### #######" name="phoneNo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea id="message" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="message" rows="3" placeholder="Message" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
                <br/>
            </div>
        </div>
    </section>
    <!-- Contact Us Section -->
    <div class="well" style="background-color: #cccccc;">
        <footer>
            <p style="text-align: center; padding: 0.5%;">&copy; {{ ' RA. Department of Computer Science. University of Jaffna' }}</p>
        </footer>
    </div>
</div>
@endsection
