
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>fraucCityWide.com</title>

		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/all.min.css">

    <!-- Custom styles for this template -->
    <!-- <link href="navbar-fixed-top.css" rel="stylesheet"> -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

		<script>

      function initialize() {
        var myLatlng = new google.maps.LatLng(39.45, -119.821812);
        var mapOptions = {
          zoom: 9,
          center: myLatlng
        }

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();

      }

      google.maps.event.addDomListener(window, 'load', initialize);

    

    </script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .city-container{
        opacity:1;
        padding: 0 5px;
      }

      .city-inner {
        background-color: #666666;
        color: #FFFFFF;
        padding:5px 0;
        margin-bottom: 10px;
        border-radius: 5px;

      }

      .modal-backdrop{
        z-index: 1000;
      }

      .error{
        color: red;
      }
    </style>


  </head>

  <body>

    @yield('content')

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   	<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>
      var email = $('#email');
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

        if(!email.val()){
          $('#email-error').addClass('error').text('Email is required before submitting form.');
        }
        if(email.val() && city.val() !== null){
          $.post("/comingsoon", {city: city.val(), email:email.val()})
            .done(function(data){
              console.log('Success!');
              if(data !== 'OK'){
                $('#email-error').addClass('error').text(data.email[0]);
              }else{
                $('#register-for-emails').html('<div class="alert alert-success"><h3>We\'ve been wanting to partner with you for the longest time. Go ahead, check your email...we\'ve sent you a top secret message.</h3></div>');

                setTimeout(function(){
                  $('.modal.in').modal('hide').fast();
                    }, 6000);
              }
            });
        } else {
          console.log('failed');
        }
      });
    </script>
  </body>
</html>
