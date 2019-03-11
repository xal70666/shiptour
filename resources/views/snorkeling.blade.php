@extends('template')
@section('content')

        {{-- snorkeling --}}
        <section class="py-5">
          <div class="container">
              <div class="col-lg-12 text-center" style="margin-top: 50px;">
                @if($errors->any())
                  <span class="label" style="color: #721c24;">{{$errors->first()}}</span>
                @endif
                <h3>Snorkeling</h3>
                <h5>Blue Lagoon & Tanjung Jepun Snorkeling In East Bali</h5>
              </div>
            <div class="row">
              <div class="col-md-3 col-sm-6">
                  <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/blue-lagoon-raniabalitour.jpg')}}" alt="">
              </div>
              <div class="col-md-3 col-sm-6">
                  <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/snorkeling.jpg')}}" alt="">
              </div>
              <div class="col-md-3 col-sm-6">
                  <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/snorkeling2-getyourguide.jpg')}}" alt="">
              </div>
              <div class="col-md-3 col-sm-6">
                  <img class="img-fluid d-block mx-auto" src="{{ asset('images/snorkeling/snorkeling3-balimarinavillas.jpg')}}" alt="">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <p>
                  <b>
                    <h3>Description</h3>
                  </b>
                </p>
                <p>
                  The bay is mostly calm throughout the year and it’s best to swim at higher tide due to the proximity of the reef. Also, if you’re up for some diving adventures the waters around Blue Lagoon are high on East Bali’s top ‘must-do’ lists. Diving boats take a five-minute boat ride from Padangbai and underneath the waves, prepare for sightings of large Napoleon wrasse, reef shark, stonefish, moray and blue ribbon eels, nudibranchs, rays, squids and octopuses, giant frogfish, cuttlefish and others. You can also extend your excursion to the white sand-bottomed dive site of Jepun nearby.
                </p>
                <p>
                  Source: http://www.bali-indonesia.com/magazine/blue-lagoon-beach.htm
                </p>
              </div>
            </div>

            <div class="pull-right col-md-6">
              <div class="inline">
                <p><b>
                  <h5>
                    <i class="fa fa-money"></i>
                    Price</h5>
                  </b>
                  <strike>
                    IDR 700.000 / Person
                  </strike>
                  &nbsp
                  <b>
                    IDR 300.000 / Person
                  </b>
                </p>

              </div>
              <p>
                <b>
                  <h5>
                    <i class="fa fa-clock-o"></i>
                    Duration</h5>
                </b>
                2 Hours
              </p>
              <p>
              </p>
            </div>


            <div class="card">
              <div class="card-header">
                  WHAT’S INCLUDED
              </div>
              <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                <p class="card-text">
                  <p>
                    <i class="fa fa-check-square" style="color: green;" aria-hidden="true"></i> Mineral Water
                  </p>
                  <p>
                    <i class="fa fa-check-square" style="color: green;" aria-hidden="true"></i> Snorkeling Equipment
                  </p>
                  <p>
                    <i class="fa fa-check-square" style="color: green;" aria-hidden="true"></i> Boat
                  </p>
                </p>
              </div>
            </div>

            <div class="row">

              <div class="col-md-12 text-center">
                <br>
                <form class="form-group form-inline" action="{{route('book-snorkeling')}}" method="post">
                  {{csrf_field()}}
                    <select class="form-control" name="id_destinasi" id="id_destinasi" style="margin: 10px;" required>
                      <optgroup label="Destination">
                        <option value="6">Blue Lagoon</option>
                        <option value="7">Tanjung Jepun</option>
                      </optgroup>
                    </select>
                    <select class="form-control" name="person" id="person" style="margin: 10px;" required>
                      <optgroup label="Person">
                        @for ($i=1; $i < 11; $i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </optgroup>
                    </select>
                    <input type="text" name="departure" id="datepicker-departure" value="" class="form-control" style="margin: 10px;" required>
                    <button type="submit" class="btn btn-primary form-control"> BOOK NOW !
                    </button>
                </form>
              </div>
            </div>

          </div>
        </section>

@endsection
