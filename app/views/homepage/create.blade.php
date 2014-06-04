@extends('layout.main_layout')

@section('content')
        <div id="page-content-wrapper">
          <div class="content-header">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
                <h1>
                    <a id="menu-toggle" href="#" class="btn btn-default">Menu</i></a>
                    {{ HTML::image("img/frauccitywideLogo200x50.png", "Email Header",['width' => '200', 'style' => 'display: inlne-block;']) }}
                </h1>								
							</div>
						</div>
           </div>
            
        	<!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <p class="lead">Quick who, what, where, when, how.</p>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <p>More details on what is going on. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, commodi, delectus, labore veritatis eveniet possimus error distinctio alias aut dicta minima accusantium illo unde officiis ut dolorum deleniti laboriosam similique?</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="city-tile text-center">
                  <h3>Carson City</h3>
                  <p class="lead">July , 2014</p>
                  <p>Available Spots (80)</p>
                  <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, perspiciatis eius autem minima quam aperiam ad. Soluta, consequuntur, libero, mollitia, accusantium corporis natus beatae distinctio sint ipsum quos quas commodi.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="city-tile text-center">
                  <h3>Reno</h3>
                  <p class="lead">July , 2014</p>
                  <p>Available Spots (80)</p>
                  <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, nesciunt ea voluptas ut fugit dolores repudiandae excepturi nemo beatae deleniti minus ipsa numquam maxime similique tempore. Nulla, quasi eligendi illo!</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="city-tile text-center">
                  <h3>Minden / Gardnerville</h3>
                  <p class="lead">July , 2014</p>
                  <p>Available Spots (80)</p>
                  <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, incidunt vero inventore necessitatibus cumque earum hic sequi harum ab dicta praesentium aperiam! Nostrum, consequatur, earum aliquid voluptas impedit assumenda recusandae.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="city-tile text-center">
                  <h3>Sparks</h3>
                  <p class="lead">July , 2014</p>
                  <p>Available Spots (80)</p>
                  <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, quibusdam, quia, quam inventore possimus vero dolorum neque ex magni laudantium reiciendis facilis architecto asperiores necessitatibus eveniet deserunt voluptatibus commodi illum!</p>
                </div>
              </div>
              <div class="col-md-6 col-md-offset-3" style="margin-top: 25px;">
                <a href="" class="btn btn-lg btn-primary btn-block">Sign up and list your yardsale.</a>
              </div>
            </div>
          </div>
        </div>
@stop