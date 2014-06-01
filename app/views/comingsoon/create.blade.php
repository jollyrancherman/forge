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
          <h2>Welcome to Frauc CityWide!</h2>
          <p class="lead">The inaugural Frauc CityWide yard sales will be taking place this summer, with dates to be announced soon for Gardnerville, Carson, Reno and Sparks. If you are interested in hosting a yard sale in one of these cities, or looking for a map of the locations, enter your email address- and we will send you an update as soon as we have it.</p>
          <p class="lead">Registration is $12 per house participating. $10 of the registration goes to the {{ link_to('http://www.bbbsnn.org/site/c.aiINI5NMKeKYF/b.7529395/k.F024/Home_Page.htm', 'Big Brothers and Big Sisters of Northern Nevada',['target' => '_blank']) }} and $2 goes towards yard sale signs.</p>
            
          <!-- Button trigger modal -->
          <p>
            <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" data-backdrop="true">
              Sign up for updates and pre-registration!
            </button>
          </p>
          <p> 
            <h3 style="margin-top: 40px;">Wanna talk? <a href="#contactModal" role="button" data-toggle="modal">Click here</a> to send us a message!</h3>          
          </p>
        <h4 style="margin-top: 40px;">Our shameless plug: Looking for a place to sell or auction online for free? Visit us at {{ link_to('http://frauc.com/', 'Frauc.com', ['target' => '_blank']) }}... this is an offer you can't refuse.</h4>
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
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
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

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="contact-us-message">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">We'd love to hear from you!</h4>
      </div>
        {{ Form::open(['id'=>'submit_contact']) }}
      <div class="modal-body">
        <p class="lead">Need help? Have a question? Do you want to suggest an idea? We would love to hear from you!</p>      

          <!-- Name -->
          <div class="form-group">
            {{ Form::label('name', 'Name:', ['class' => 'control_label']) }} <span style="color:#CCC">optional</span>
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'contact_name']) }}
          </div>
          
          
          <!-- Email -->
          <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control_label']) }}
            {{ Form::text('email', null, ['class' => 'form-control','id' => 'contact_email', 'placeholder' => 'email@you.com (so that we can contact you)']) }}
            <span class="help-block" id="contact-email-error"></span>
          </div>

          <!-- message -->
          <div class="form-group">
            {{ Form::label('message', 'Message:', ['class' => 'control_label']) }}
            <span class="help-block" id="contact-message-error"></span>
            {{ Form::textarea('message', null, ['class' => 'form-control', 'id' => 'contact_message']) }}
          </div>
          
          


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- SUBMIT -->
        {{ Form::submit('Send Message', array('class' => 'btn btn-primary')) }}
        
      </div>
        {{ Form::close() }}
    </div>
  </div>
</div>
@stop