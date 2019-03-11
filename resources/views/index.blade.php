@extends('template')
@section('content')
  <style type="text/css">
    .title-swiper {
      font-size: 20px;
      color: #007bff;
      margin-top: 10px;
      margin-left: 19%;
    }

    @media only screen and (max-width: 768px) {
      #to {
        margin-top: -10px;
        margin-left: 10px;
        margin-right: 10px;
      }

      #datepicker-departure {
        margin-left: 10px;
        margin-right: -22px;
      }

      #dewasa {
        margin-left: 10px;
        margin-right: -10px;
      }

      #submit {
        margin-left: 22px;
      }

      #form-oneform {
        margin-left: 60px;
      }

      .oneform {
        width: 100%;
        left: 0;
        padding-left: -90px;
        height: auto;
        margin-top: -160px;
        background-color: rgba(34,34,0,0.15);

      }

      .title-swiper {
        display: none;
      }
    }
  </style>
  @php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date("h:i:s");
    $tanggal = date("Y-m-d");
  @endphp

      <!-- Header -->
      {{-- <header class="masthead">
        <div class="container">
          <div class="intro-text">
            <div class="intro-lead-in">Welcome To Our Studio!</div>
            <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
          </div>
        </div>
      </header> --}}

      <!-- Slider -->
      <div class="swiper-container main-slider" id="myCarousel">
        <div class="oneform">
          <div class="main-slider title-swiper">
            <p>Fast Boat Tickets to Lombok or Bali, Indonesia</p>
            <p style="font-size: 14px; color: #000000">Hello, where are you going?</p>
          </div>
          <div class="container">

            <span class="help-block" style="color: #721c24;"> {{ $errors->first() }}</span>

            <form  role="form" id="form-oneform" method="post" action="{{ route('available')}}">
                {{csrf_field()}}

                <div class="form-inline">
                  <div class="form-group">
                    <select id="from" name="from" class="form-control" placeholder="asda">
                      <optgroup label="From">
                      @foreach($destinasi as $value)
                        <option value="{{$value->id_destinasi}}">{{$value->nama}}</option>
                      @endforeach
                      </optgroup>
                    </select>
                    @if ($errors->has('from'))
                      <span class="help-block" style="color: #721c24;"> {{ $errors->first('from') }}</span>
                    @endif
                  </div>

                  <div class="form-group" style="margin-right: 10px;">
                    <select id="to" name="to" class="form-control">
                      <optgroup label="To">
                        @foreach($destinasi as $value)
                          <option value="{{$value->id_destinasi}}">{{$value->nama}}</option>
                        @endforeach
                      </optgroup>
                    </select>
                    @if ($errors->has('to'))
                      <span class="help-block" style="color: #721c24;"> {{ $errors->first('to') }}</span>
                    @endif
                  </div>

                  <div class="form-group" style="margin-right: 10px;">
                    {{-- <label for="departure">Departure</label> --}}
                    <input type="text" name="departure" id="datepicker-departure" style="background-color: #ffffff;" value="{{$tanggal}}" class="form-control" readonly>
                    @if ($errors->has('departure'))
                      <span class="help-block" style="color: #721c24;"> {{ $errors->first('departure') }}</span>
                    @endif
                  </div>

                  <div class="form-group" style="margin-right: 10px;">
                    <select name="dewasa" id="dewasa" class="form-control">
                        <optgroup label="Person">
                        @for ($i=1; $i < 70; $i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                        </optgroup>
                    </select>
                  </div>

                  <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-info">Search</button>
                  </div>
                </div>

              </form>
          </div>
        </div>

        <div class="swiper-wrapper">
          {{-- <div class="swiper-slide slider-bg-position" style="background:url('http://grafreez.com/wp-content/temp_demos/burnout/img/1.jpg')" data-hash="slide1"> --}}
          <div class="swiper-slide slider-bg-position" style="background:url('{{ asset('/images/1.jpg')}}'); background-repeat: no-repeat;
          background-attachment: scroll;
          background-position: center center;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;" data-hash="slide1">
            {{-- <h2>It is health that is real wealth and not pieces of gold and silver</h2> --}}
          </div>
          <div class="swiper-slide slider-bg-position" style="background:url('{{ asset('/images/2.jpg')}}');" data-hash="slide2">
            {{-- <h2>Happiness is nothing more than good health and a bad memory</h2> --}}
          </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
        <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
      </div>



      <!-- Services -->
      <section id="services">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">Facilities</h2>
              <h3 class="section-subheading text-muted">We have several facilities on fast boats including : </h3>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-music fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">Full Music</h4>
              {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
            </div>
            <div class="col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-asterisk fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">Full AC</h4>
              {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
            </div>
            <div class="col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-user-circle fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">Toilet</h4>
              {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
            </div>
          </div>
        </div>
      </section>

      <!-- Portfolio Grid -->
      <section class="bg-light" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">Destination</h2>
              {{-- <h3 class="section-subheading text-muted"></h3> --}}
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/pelabuhan-bangsal.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Bangsal Harbor</h4>
                <p class="text-muted">Lombok, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/gili-trawangan.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Gili Trawangan</h4>
                <p class="text-muted">Lombok, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/padangbai.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Padang Bay</h4>
                <p class="text-muted">Bali, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/gili-air.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Gili Air</h4>
                <p class="text-muted">Lombok, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/gili-meno.png')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Gili Meno</h4>
                <p class="text-muted">Lombok, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/padangbai2.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Padang Bay</h4>
                <p class="text-muted">Bali, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal7">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/nusa-penida.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Nusa Penida</h4>
                <p class="text-muted">Bali, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal8">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/nusa-lembongan.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Nusa Lembongan</h4>
                <p class="text-muted">Bali, Indonesia</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="#portfolioModal9">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fa fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{ asset('images/destination/serangan.jpg')}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>Serangan</h4>
                <p class="text-muted">Bali, Indonesia</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      {{-- snorkeling --}}
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center" >
              <h3>SNORKELING</h3>
              <br>
              <h5>Blue Lagoon & Tanjung Jepun Snorkeling In Bali, Indonesia</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/blue-lagoon-raniabalitour.jpg')}}" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/snorkeling.jpg')}}" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/snorkeling2-getyourguide.jpg')}}" alt="">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center" style="margin-top: 10px;">
              <span><strike>IDR 700.000</strike></span>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center" style="margin-top: 10px;">
              <span><b>IDR 300.000</b></span>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <a href="{{ route('snorkeling-bali') }}" style="margin-top: 10px;" class="btn btn-warning btn-sm">Read more!</a>
            </div>
          </div>
        </div>
      </section>


      <!-- About -->
      {{-- <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">About</h2>
              <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <ul class="timeline">
                <li>
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ asset('images/agency/about/1.jpg')}}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>2009-2011</h4>
                      <h4 class="subheading">Our Humble Beginnings</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ asset('images/agency/about/2.jpg')}}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>March 2011</h4>
                      <h4 class="subheading">An Agency is Born</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ asset('images/agency/about/3.jpg')}}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>December 2012</h4>
                      <h4 class="subheading">Transition to Full Service</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ asset('images/agency/about/4.jpg')}}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>July 2014</h4>
                      <h4 class="subheading">Phase Two Expansion</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <h4>Be Part
                      <br>Of Our
                      <br>Story!</h4>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section> --}}

      <!-- Team -->
      {{-- <section class="bg-light" id="team">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
              <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="team-member">
                <img class="mx-auto rounded-circle" src="{{ asset('images/agency/team/1.jpg')}}" alt="">
                <h4>Kay Garland</h4>
                <p class="text-muted">Lead Designer</p>
                <ul class="list-inline social-buttons">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-linkedin"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="team-member">
                <img class="mx-auto rounded-circle" src="{{ asset('images/agency/team/2.jpg')}}" alt="">
                <h4>Larry Parker</h4>
                <p class="text-muted">Lead Marketer</p>
                <ul class="list-inline social-buttons">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-linkedin"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="team-member">
                <img class="mx-auto rounded-circle" src="{{ asset('images/agency/team/3.jpg')}}" alt="">
                <h4>Diana Pertersen</h4>
                <p class="text-muted">Lead Developer</p>
                <ul class="list-inline social-buttons">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-linkedin"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
          </div>
        </div>
      </section> --}}

      <!-- Clients -->
      {{-- <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/agency/logos/envato.jpg')}}" alt="">
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/agency/logos/designmodo.jpg')}}" alt="">
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/agency/logos/themeforest.jpg')}}" alt="">
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('images/agency/logos/creative-market.jpg')}}" alt="">
              </a>
            </div>
          </div>
        </div>
      </section> --}}

      @include('contact')
      @include('footer')

      <!-- Portfolio Modals -->

      <!-- Modal 1 -->
      <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Bangsal Harbor</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/pelabuhan-bangsal.jpg')}}" alt="">
                    <p>
                      As an island nation, it should be if Indonesia has many coastal areas and docks. Almost every province in Indonesia has at least one port or just a pier to anchor a small ship, for example is Siwa Wajo Port. This place is also commonly referred to as Shiva Bangsalae in South Sulawesi Province.
                    </p>
                    <p>
                      Likewise with the Province of West Nusa Tenggara with its Mataram capital. Natural beauty and beaches in this area are also not inferior to Kuta beach in Bali. In this area, there are several large ports that are used for various purposes, both ferry ports, and large ports of inter-island crossings.
                    </p>
                    <p>
                      In this Province, there are several ports that are indeed used for crossings to Gili or small islands in the West Nusa Tenggara Province, including Bangsal Harbor, Lembar Harbor.
                    </p>
                    <p>
                      Bangsal Harbor is a place frequented by both domestic and foreign tourists. This is considering that this location is one of the fastest routes that tourists can take when they want to cross to Gili Trawangan from the airport or airport.
                    </p>
                    <p>Source : www.jejakpiknik.com</p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Threads</li>
                      <li>Category: Illustration</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 2 -->
      <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Gili Trawangan</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/gili-trawangan.jpg')}}" alt="">
                    <p>
                      Gili Trawangan is the largest of the three small islands or gili located in the northwest of Lombok. Trawangan is also the only dyke whose height is above sea level is quite significant. With a length of 3 km and a width of 2 km, Trawangan has a population of around 800 people. Among the three gili, Trawangan has the most diverse facilities for tourists; the tavern "Tar na Nog" claims that Trawangan is the smallest island in the world with its Irish bar. The most densely populated part is the east of the island.
                    </p>
                    <p>
                      Trawangan has more "party" nuances than Gili Meno and Gili Air, because of the number of parties all night long, the program is rotated every night by several crowded places. Popular activities carried out by tourists in Trawangan are scuba diving (with PADI certification), snorkeling (on the northeastern coast), kayaking, and surfing. There are also several places for tourists to learn to ride around the island.
                    </p>
                    <p>
                      On Gili Trawangan (as well as in the other two gili), there are no motorized vehicles, because they are not permitted by local rules. Common means of transportation are bicycles (rented by local people for tourists) and cidomo, a simple horse-drawn carriage commonly found in Lombok. To travel to and from the third resort, residents usually use motorized boats and speedboats.
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Explore</li>
                      <li>Category: Graphic Design</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 3 -->
      <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Padangbai</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/padangbai.jpg')}}" alt="">
                    <p>
                      Most visitors to Padang Ba are there to catch a boat to Lombok and sadly miss out on a charming little place in its own right. People who do give it a chance often cancel their trip in order to spend more time in this lovely village. Spending a night or two here will certainly not be time wasted.

There is good diving and snorkeling in the immediate area, and a number of operators are present to cater for those activities. This is also a fairly convenient base from which to explore some of the wider attractions of East Bali. Accommodation tends to be quite basic and aimed at the backpacker market, but there are more upmarket options in town.

It's a great place to relax, enjoy the beach and eat fish!
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Finish</li>
                      <li>Category: Identity</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 4 -->
      <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Gili Air</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/gili-air.jpg')}}" alt="">
                    <p>
                      Although Gili Air is closest to the Lombok mainland it is the most overlooked of the three Gili islands in terms of development. However, that is all set to change as the market here is geared very much towards the budget traveler and tropical island explorer. A lot of visitors actually prefer the grass roots atmosphere of Gili Air and the feeling of really being part of a close knit local community.
                    </p>
                    <p>
                      The circumference of Gili Air island is travelable by foot in around two and a half hours but be sure to pack some supplies as you’re heading well off the beaten track.

As with Gili Meno the pace of life is slow and endearing to those who really want to escape the hustle and bustle of the outside world.
                    </p>
                    <p>
                      The latest arrival to show how Gili Air is very slowly catching up with big brother Trawangan, is a new ATM machine. It is located on the east side in the middle of what you may call the main strip, basically the concentration from the harbour to another fairly new operation of bungalows called Bibi’s.

It takes all the usual cards like – Visa, master Card, even cirrus and Maestro. With the new power cable from the mainland Lombok installed, the time was right. It is a great advantage to visitors as they don’t have to take bundles of cash, and even though there are still some small “Mati Lampu” or power outages for a few hours here and there it means people may stay longer.
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Lines</li>
                      <li>Category: Branding</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 5 -->
      <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Gili Meno</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/gili-meno.png')}}" alt="">
                    <p>
                      Only a kilometre from Gili Trawangan and set in the middle of the three islets lies the real Robinson Crusoe experience of the Gilis with some of the best beaches to be found.
Only two kilometres long and one wide, Gili Meno is the smallest of the three islands and by far the most peaceful and under developed. It’s possible to walk around the island along the beach or paths of Gili Meno in under two hours.
                    </p>
                    <p>
                      Most visitors are attracted to Gili Meno for the lure of total escapism and it is therefore very popular with honeymooning couples and adventurous castaway types.
                      The dining scene is predominantly local cafes with grilled fish on the beach as dusk approaches.
Lazing around in a hammock, reading books and playing chess with the friendly locals  also ranks very highly on the daily Meno agenda.
For divers and snorkelers, the island boasts the infamous ‘Gili Meno Wall‘ where during the day turtles freely swim by and giant gorgonian fans hang amongst the colourful corals. At night divers can witness huge Moray Eels and the entertaining Spanish Dancers, baby cuttlefish and a whole array of crustaceans.
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Southwest</li>
                      <li>Category: Website Design</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 6 -->
      <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Padangbai</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/padangbai2.jpg')}}" alt="">
                    <p>
                      Most visitors to Padang Bai are there to catch a boat to Lombok and sadly miss out on a charming little place in its own right. People who do give it a chance often cancel their trip in order to spend more time in this lovely village. Spending a night or two here will certainly not be time wasted.

There is good diving and snorkeling in the immediate area, and a number of operators are present to cater for those activities. This is also a fairly convenient base from which to explore some of the wider attractions of East Bali. Accommodation tends to be quite basic and aimed at the backpacker market, but there are more upmarket options in town.

It's a great place to relax, enjoy the beach and eat fish!
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Window</li>
                      <li>Category: Photography</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal 7 -->
      <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Nusa Penida</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/nusa-penida.jpg')}}" alt="">
                    <p>
                      Nusa Penida is an island southeast of Indonesia's island Bali and a district of Klungkung Regency that includes the neighbouring small island of Nusa Lembongan. The Badung Strait separates the island and Bali. The interior of Nusa Penida is hilly with a maximum altitude of 524 metres. It is drier than the nearby island of Bali. There is very little tourist infrastructure.

  There are two small islands nearby - Nusa Lembongan and Nusa Ceningan - which are included within the district (kecamatan). Administratively, the kecamatan of the same name, had a population of 45,178 in 2010 census, covering 202.8 km2, very little changed from 10 years prior.
                    </p>
                    <p>
Nusa Penida, and neighbouring Lembongan and Ceningan islands, are a bird sanctuary. The islands communities have used traditional Balinese village regulations to create the sanctuary. The idea of a sanctuary came from the Friends of the National Parks Foundation (FNPF).
                    </p>
                    <p>
In 2006 all 35 villages (now 41 villages) agreed to make bird protection part of their traditional regulations (“awig-awig”). Since then, the FNPF has rehabilitated and released various Indonesian birds, most notably the critically endangered Bali starling which is endemic to Bali but whose numbers in the wild had declined to less than 10 in 2005. After a two-year program by FNPF in which 64 cage bred birds were rehabilitated and released onto Nusa Penida, their number had increased to over 100 in 2009. Other released birds include the Java sparrow, Mitchell's lorikeet and sulphur crested cockatoo.
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Window</li>
                      <li>Category: Photography</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 8 -->
      <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Nusa Lembongan</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/nusa-lembongan.jpg')}}" alt="">
                    <p>

                      Nusa Lembongan is an island located southeast of Bali, Indonesia. It is part of a group of three islands that make up the Nusa Penida district, of which it is the most famous. This island group in turn is part of the Lesser Sunda Islands
                    </p>

                    <p>
Nusa Lembongan is approximately 8 square kilometres in area with a permanent population estimated at 5,000. Twelve kilometres of the Badung Strait separates Nusa Lembongan from Bali Island. The island is surrounded by coral reefs with white sand beaches and low limestone cliffs. Nusa Lembongan is separated from Nusa Ceningan by a shallow estuarine channel which is difficult to navigate at low tide. There are no permanent waterways on Nusa Lembongan. There is a suspension bridge linking Nusa Lembongan and Nusa Ceningan which takes foot and motorbike traffic only.
                    </p>

                    <p>
There are three main villages on the island. Jungut Batu and Mushroom Bay are the centres of the tourist-based industry and activities on the island whilst much of the permanent local population resides in Lembongan Village.
                    </p>
                    <p>
To the east, the Lombok Strait separates the three islands from Lombok, and marks the biogeographical division between the fauna of the Indomalayan ecozone and the distinctly different fauna of Australasia. The transition is known as the Wallace Line, named after Alfred Russel Wallace, who first proposed a transition zone between these two major biomes.
                    </p>
                    <p>
                      The north-eastern side of the island is flanked by a relatively large area of mangroves totalling some 212 hectares.

                      Nusa Lembongan is served by regular direct speed-boat services, mostly from the east-coast Bali resort town of Sanur. Crossing time is approximately 30 minutes and services run at regular intervals during daylight hours. Larger cargo boats also run daily from the Bali port town of Padang Bai.
                    </p>
                    <p>
                      The island is populated by very few cars. For its main source of transportation is by scooters and foot, due to the small size of the island.
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Window</li>
                      <li>Category: Photography</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal 9 -->
      <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <h2 class="text-uppercase">Serangan</h2>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/destination/serangan.jpg')}}" alt="">
                    <p>
Serangan is a sub-district located in South Denpasar District, Bali, which is located about 10 kilometers to the south from downtown Denpasar. In the past, Serangan was an island separated from the mainland of Bali, but it was finally reclaimed so that it was integrated.
                    </p>
                    <p>
                      The location surrounded by mangrove trees looks very beautiful and soothing if it first enters the gates of the area. Here are some tourist destinations that can be found by tourists on Serangan Island.
                    </p>
                    <p>
                      Marine tourism destinations in the waters Serangan is no less interesting than other marine tourism such as Nusa Dua, Kuta, Legian, and other Sanur. Many travel agencies take their guests or tourists to visit various water tourism games such as jet skiing, parasailing and more.
                    </p>
                    <p>
                      Turtle Park Serangan,
                    This place has various turtles and turtle knick knacks. The location is on Jalan Tukad Punggawa. Besides Turtle Park, there is another center for turtle conservation and education in the Serangan area, which is on Jalan Tukad Wisata.
                    </p>
                    <p>
                      In this place you will see how the process of turtles lay eggs, hatch into turtles and adults become turtles.
                    </p>
                    <p>
The Serangan area is not too wide so it does not take much time to go one place to another.
                    </p>
                    {{-- <ul class="list-inline">
                      <li>Date: January 2017</li>
                      <li>Client: Window</li>
                      <li>Category: Photography</li>
                    </ul> --}}
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fa fa-times"></i>
                      Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
