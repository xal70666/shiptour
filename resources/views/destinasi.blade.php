@extends('template')
@section('content')
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
            <h4>Padangbai</h4>
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
            <h4>Padangbai</h4>
            <p class="text-muted">Bali, Indonesia</p>
          </div>
        </div>
      </div>
    </div>
  </section>


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
  @include('contact')
@endsection
