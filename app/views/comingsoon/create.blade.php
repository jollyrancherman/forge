@extends('layout.template')

@section('content')
    <div class="navbar-wrapper">
      <div class="container">

      </div>
    </div>


    <!-- Map
    ================================================== -->
    <div id="map-canvas" class="map">

    </div>



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-12" style="background-color: #fff;opacity: .9;">
        <img id="header-image" class="img-responsive" src="/img/frauc-city-wide-header.png" alt="">
          <!-- <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image"> -->
          <h2>Frauc.com teams up with Big Brothers, Big Sisters and Advocates to end Domestic Violence in Northern Nevada!</h2>


          <p>Frauc.com is hosting a city wide yardsale.</p>

          <div class="row" style="margin-bottom: 10px;">

            <div class="col-md-3 city-container">
              <div class="city-inner">
                <h3 class="text-center">Gardnerville / Minden</h3>
                <h4 class="text-center">Saturday July 18th 2014</h4>
                <h4 class="text-center">Interested ( {{ !isset($numbers['douglas']) ? '0' : $numbers['douglas']}} people)</h4>
              </div>
            </div>

            <div class="col-md-3 city-container">
              <div class="city-inner">
                <h3 class="text-center">Carson City</h3>
                <h4 class="text-center">Saturday July 18th 2014</h4>
                <h4 class="text-center">Interested ( {{ !isset($numbers['carson']) ? '0' : $numbers['carson']}} people)</h4>
              </div>            
            </div>

            <div class="col-md-3 city-container">
              <div class="city-inner">
                <h3 class="text-center">Reno</h3>
                <h4 class="text-center">Saturday July 18th 2014</h4>
                <h4 class="text-center">Interested ( {{ !isset($numbers['reno']) ? '0' : $numbers['reno']}} people)</h4>
              </div>            
            </div>

            <div class="col-md-3 city-container">
              <div class="city-inner">
                <h3 class="text-center">Sparks</h3>
                <h4 class="text-center">Saturday July 18th 2014</h4>
                <h4 class="text-center">Interested ( {{ !isset($numbers['sparks']) ? '0' : $numbers['sparks']}} people)</h4>
              </div>            
            </div>

          </div>
            
          <!-- Button trigger modal -->
          <p>
            <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" data-backdrop="true">
              Sign up for updates and pre-registration!
            </button>
          </p>
        </div><!-- /.col-lg-2 -->
      </div><!-- /.row -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="register-for-emails">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Frauc.com City Wide Garage Sale Reminder</h4>
      </div>
        {{ Form::open(['id'=>'submit_email']) }}
      <div class="modal-body">
        <p class="lead">Would you like to follow us. Give us your email address and we will keep you updated on 
          the current status. Also, follow us on facebook and twitter!</p>
          <!-- FIELD -->
          <div class="form-group">
            {{ Form::label('city', 'Select Your City', ['class' => 'control_label']) }}
            {{ Form::select('city', [
              'null' => 'Please select a city', 
              'douglas' => 'Minden/Gardnerville', 
              'carson' => 'Carson City', 
              'reno' => 'Reno',
              'sparks' => 'Sparks',
              ],null, ['class' => 'form-control','id' => 'city']); 
            }}
            <span class="help-block error" id="city-error"></span>   
          </div>        

          <!-- Email -->
          <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control_label']) }}
            {{ Form::text('email', null, ['class' => 'form-control','id' => 'email']) }}
            <span class="help-block" id="email-error"></span>
          </div>
          


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- SUBMIT -->
        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        
      </div>
        {{ Form::close() }}
    </div>
  </div>
</div>  
@stop