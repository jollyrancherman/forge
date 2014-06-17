
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Helping coordinate a city wide yardsale in northern nevada including Reno, Sparks, Carson City, Gardnerville and Minden">
    <meta name="author" content="Anthony Sullivan">

    <title>FraucCityWide.com</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->

    @yield('scripts-top')
    <style>
#wrapper {
  padding-left: 250px;
  transition: all 0.4s ease 0s;
}

#sidebar-wrapper {
  margin-left: -250px;
  left: 250px;
  width: 250px;
  background: #3399CC;
  position: fixed;
  height: 100%;
  overflow-y: auto;
  z-index: 1000;
  transition: all 0.4s ease 0s;
}

#page-content-wrapper {
  width: 100%;
}

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar-nav li {
  line-height: 20px;
  text-indent: 20px;
}

.sidebar-nav li a {
  color: #EEEEEE;
  display: block;
  text-decoration: none;
}

.sidebar-nav li a:hover {
  color: #fff;
  background: rgba(255,255,255,0.2);
  text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  line-height: 60px;
  font-size: 18px;
}

.sidebar-nav > .sidebar-brand a {
  color: #EEEEEE;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}

.content-header {
  padding: 20px 0 0 0;
  height: 65px;
  line-height: 65px;
}

.content-header h1 {
  margin-left: 20px;
  line-height: 65px;
  display: inline-block;
}

#menu-toggle {
  display: none;
}

.inset {
  padding: 20px;
}

@media (max-width:767px) {

#wrapper {
  padding-left: 0;
}

#sidebar-wrapper {
  left: 0;
}

#wrapper.active {
  position: relative;
  left: 250px;
}

#wrapper.active #sidebar-wrapper {
  left: 250px;
  width: 250px;
  transition: all 0.4s ease 0s;
}

#menu-toggle {
  display: inline-block;
  margin-left: 15px;
}

.inset {
  padding: 15px;
}

}

.city-tile{
  margin: 25px 5px 5px 5px;
  background-color: #DDDDDD;
  padding: 5px;
  border-radius: 8px;
  height: 100%;
}

/* Base styles (regardless of theme) */
.bs-callout {
  margin: 20px 0;
  padding: 15px 30px 15px 15px;
  border-left: 5px solid #eee;
}
.bs-callout h4 {
  margin-top: 0;
}
.bs-callout p:last-child {
  margin-bottom: 0;
}
  .bs-callout code,
  .bs-callout .highlight {
  background-color: #fff;
}

/* Themes for different contexts */
.bs-callout-danger {
  background-color: #fcf2f2;
  border-color: #d9534f;
}
.bs-callout-warning {
  background-color: #fefbed;
  border-color: #f0ad4e;
}
.bs-callout-info {
  background-color: #f0f7fd;
  border-color: #5bc0de;
}

.bs-callout-success {
  background-color: #dff0d8;
  border-color: #3c763d;
}

.error-msg {
  color: red;
}

.control_label.small{
  color: #AAA;
}
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout._navbar')

        <!-- Page content -->
        <div id="page-content-wrapper">
          <div class="content-header">
            <div class="row">
              <div class="col-xs-2" style="line-height: 0;">
                <a id="menu-toggle" href="#" class="btn btn-primary btn-xs">Menu</i></a>
              </div>
              <div class="col-xs-7">
                {{ HTML::image("img/logoWithShadowLarge.png", "Email Header",['class' => 'img-responsive pull-left', 'width' => '600', 'style' => 'display: inlne-block;']) }}                  

            
              </div>
              <div class="col-xs-2">
              <div class="row">
                <p class="small" style="margin: 5px; line-height: 12px;">Brought to you by:</p>
              </div>
              <div class="row">
                <a href="http://frauc.com/" target="_blank">
                  {{ HTML::image("img/logoPlusText.png", "Email Header",['class' => 'img-responsive', 'width' => '200', 'style' => 'display: inlne-block;']) }}
                </a>                                 
              </div>
              </div>
            </div>
          </div>

          <div class="content-header">

            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                @if(Session::has('message'))         
                    <div  class="{{ Session::get('messageType') }} ">
                      <h4>
                        {{ Session::get('message') }}
                      </h4>
                      @if(Session::get('message2'))
                        <p>{{ Session::get('message2') }}</p>
                      @endif
                    </div>
                @endif               
              </div>
            </div>

          </div>

        @yield('content')

    </div>

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
        <p class="lead">Be an Insider!</p>
        <p> Sign up now to become one of the privileged. Thinking about shopping the yard sale event or can’t yet commit to hosting? We will keep you up to date with everything FraucCityWide, including maps, news, and donating information. We’ll catch you on the flip side."</p>
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
            <span class="help-block error-msg" id="city-error"></span>   
          </div>        

          <!-- Email -->
          <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control_label']) }}
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'sub_email']) }}
            <span class="help-block error-msg" id="email-error"></span>
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
            <span class="help-block error-msg" id="contact-email-error"></span>
          </div>

          <!-- message -->
          <div class="form-group">
            {{ Form::label('message', 'Message:', ['class' => 'control_label']) }}
            <span class="help-block error-msg" id="contact-message-error"></span>
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

    <!-- JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
    <script>
      var sub_email = $('#sub_email');
      var city = $('#city');
      var emailErrMsg = $('#email-error');
      var cityErrMsg = $('#city-error');

      city.change(function(){
        if(city.val() == "null"){
          cityErrMsg.text('Please Select a city');
        }else{
          cityErrMsg.text('');
        }
      });

      $("#submit_email").submit(function (event) {
        event.preventDefault();

        //validate emails address and city selected
        if(city.val() == "null"){
          cityErrMsg.text('Please Select a city');
        }else{
          cityErrMsg.text('');
        }

        if(!sub_email.val()){
          console.log(sub_email.val());
          $('#email-error').addClass('error').text('Email is required before submitting form.');
        }
        if(sub_email.val() && city.val() !== null){
          $.post("/comingsoon", {city: city.val(), email:sub_email.val()})
            .done(function(data){
              console.log('Success!');
              if(data !== 'OK'){
                $('#email-error').addClass('error').text(data.email[0]);
              }else{
                $('#register-for-emails').html('<div class="alert alert-success"><h3>We\'ve been wanting to partner with you for the longest time. Go ahead, check your email...we\'ve sent you a top secret message.</h3></div>');

                setTimeout(function() {$('.modal').modal('hide');}, 6000);
              }
            });
        } else {

        }
      });
    </script>    
    <script>
      var cname = $('#contact_name');
      var cemail = $('#contact_email');
      var message = $('#contact_message');
      var emailErrMsgContact = $('#contact-email-error');
      var messageErrMsgContact = $('#contact-message-error');

      $("#submit_contact").submit(function (event) {
        event.preventDefault();

        if(!cemail.val()){
          emailErrMsgContact.addClass('error').text('Email is required before submitting form.');
        }
        if(!message.val()){
          messageErrMsgContact.addClass('error').text('What do you want to say! This field is required.');
        }
        if(cemail.val() && message.val()){
          $.post("/contactus", {message: message.val(), email:cemail.val(), cname:cname.val()})
            .done(function(data){
              console.log('Success!');
              if(data !== 'OK'){
                $('#contact-email-error').addClass('error').text(data.email[0]);
                $('#contact-message-error').addClass('error').text(data.email[0]);
              }else{
                $('#contact-us-message').html('<div class="alert alert-success"><h3>We\'ve received your message and we thank you!</h3></div>');

                setTimeout(function() {$('.modal').modal('hide');}, 6000);

              }
            });
        } else {
          console.log('failed');
        }
      });
    </script>
    @yield('scripts-bot')
</body>

</html>
