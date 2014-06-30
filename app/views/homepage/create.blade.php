@extends('layout.main_layout')

@section('content')            
        	<!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-3 col-md-offset-1 text-center">
              <img src="/img/homepage-header-new.png" class="img-responsive" alt="Responsive image" style="margin-top: 20px;">
              </div>
              <div class="col-md-7">
                <h2>Community yard sale for Northern Nevadans</h2>
                <p class="lead">A community yard sale is like a flea market meets treasure hunt (with map, of course). Our plan is to make a shockingly useful community event out of yard sales, where hosts receive more foot traffic, and shoppers have more stopping points. </p>
                <p>Find your city below to sign up as a host. Registration is $12 per house participating. $10 of the registration goes to the Big Brothers and Big Sisters of Northern Nevada and $2 goes towards yard sale signs.</p>
                <p>Shoppers, to stay hip with the news and maps of participants, click on "Email Updates".</p>

                @if(! Sentry::check())
                  <div class="col-md-12" style="margin-bottom: 20px; margin-top: 20px;">
                    <a href="/signup" class="btn btn-lg btn-primary btn-block">Sign up and list your yard sale.</a>
                  </div>
                  @endif
              

              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 col-lg-offset-1">
                
                <div class="col-lg-3">
                  <div class="city-tile text-center">
                    <img src="/img/homepage-minden-banner.jpg" class="img-responsive" alt="Responsive image">
                    <h3>Minden / Gardnerville</h3>
                    <p class="lead">July 26, 2014</p>
                    <p>(<strong>{{ $data['douglas'] }}</strong>) spots available</p>
                    <p class="text-left">An all day event, where you choose your open hours, and share what precious items you will be selling. Sign up today, while spots are available. Thanks in advance for supporting Big Brothers Big Sisters of Northern Nevada.</p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="city-tile text-center">
                    <img src="/img/homepage-sparks-banner.jpg" class="img-responsive" alt="Responsive image">
                    <h3>Sparks</h3>
                    <p class="lead">July 26, 2014</p>
                    <p>(<strong>{{ $data['sparks'] }}</strong>) spots available</p>
                    <p class="text-left">An all day event, where you choose your open hours, and share what precious items you will be selling. Sign up today, while spots are available. Thanks in advance for supporting Big Brothers Big Sisters of Northern Nevada.</p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="city-tile text-center">
                    <img src="/img/homepage-reno-banner.jpg" class="img-responsive" alt="Responsive image">
                    <h3>Reno</h3>
                    <p class="lead">August 9, 2014</p>
                    <p>(<strong>{{ $data['reno'] }}</strong>) spots available</p>
                    <p class="text-left">An all day event, where you choose your open hours, and share what precious items you will be selling. Sign up today, while spots are available. Thanks in advance for supporting Big Brothers Big Sisters of Northern Nevada.</p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="city-tile text-center">
                    <img src="/img/homepage-carson-banner.jpg" class="img-responsive" alt="Responsive image">
                    <h3>Carson City</h3>
                    <p class="lead">August 16, 2014</p>
                    <p>(<strong>{{ $data['carson'] }}</strong>) spots available</p>
                    <p class="text-left">An all day event, where you choose your open hours, and share what precious items you will be selling. Sign up today, while spots are available. Thanks in advance for supporting Big Brothers Big Sisters of Northern Nevada.</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
@stop