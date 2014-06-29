@extends('layout.main_layout')

@section('content')
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset"> 
          	<div class="row">
              <div class="col-xs-12"><a href="/yardsale/find/{{ $city }}/listview"><i class="fa fa-list"></i> Printer Friendly List View</a></div>
          		<div class="col-xs-12" id="yardsale-map"></div>
          	</div>
						

          </div>
        </div>
@stop

@section('scripts-top')
<!-- GOOGLE MAPS API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.1.9/src/markerwithlabel.js"></script>
<!-- BLUEIMP FILE UPLOAD -->
<link rel="stylesheet" href="/css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="/css/jquery.fileupload.css">
<link rel="stylesheet" href="/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="/css/jquery.fileupload-ui-noscript.css"></noscript>

<style>
   .labels {
     color: white;
     padding: 4px;
     background-color: #3399CC;
     border-radius: 12px;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 1.2em;
     font-weight: bold;
     text-align: center;
     white-space: nowrap;
   }  

</style>
@stop


@section('scripts-bot')
<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(39.45, -119.821812);

  var addresses = {{ $data }};
  var locations = [];
  var htmlContent = [];
  var iterator = 0;
  var markers = [];
  var markerID = [];

  $.each(addresses, function(key, value){
    // locations.push([this.address, this.lat, this.lng, this.id]);
    locations.push(new google.maps.LatLng(value.lat, value.lng));

		var title = 
          '<a href="/yardsale/'+value.id+'">'+
          '<div id="content" style="height: 400px;">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h3 id="firstHeading" class="firstHeading">(#'+value.id+') '+value.address+'</h3>'+
          '<div id="bodyContent">'+
          '<p>'+value.description+'</p>'+
          '<img class="img-responsive" src="http://maps.google.com/maps/api/staticmap?center='+value.lat+','+value.lng+'&markers=icon:/img/signWithShadowMarker.png|'+value.lat+','+value.lng+'&zoom=17&size=500x300&sensor=false" alt="" />'+
          '</div>'+
          '</div>'+       
          '</a>';
    markerID.push('#'+value.id)
    htmlContent.push(title);
  });

  var map = new google.maps.Map(document.getElementById('yardsale-map'));

  var bounds = new google.maps.LatLngBounds();
  var infowindow = new google.maps.InfoWindow();

  function drop() {
    for (var i = 0; i < addresses.length; i++) {
      setTimeout(function() {
        addMarker();
      }, i * 500);
    }
  }

  function addMarker() {         
      markers.push( marker =  new MarkerWithLabel({
      position: locations[iterator],
      map: map,
      draggable: false,
      labelContent:markerID[iterator],
      labelAnchor: new google.maps.Point(0,90),
      labelClass: "labels", // the CSS class for the label
      labelInBackground: false,      
      animation: google.maps.Animation.DROP
    }));

  marker.setIcon(/** @type {google.maps.Icon} */({
    url: '/img/signWithShadowMarker.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(99, 66),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(20,60)
  }));

    var title = htmlContent[iterator];
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(title);
        infowindow.close();
        infowindow.open(map, this);
        map.setCenter(marker.getPosition());
    }); 
    var myLatLng = new google.maps.LatLng(locations[iterator]);
    bounds.extend(marker.getPosition());
    map.fitBounds(bounds);
    iterator++;
  }
  drop();
}


google.maps.event.addDomListener(window, 'load', initialize);

$('#fileupload').bind("keyup keypress", function(e) {
  var code = e.keyCode || e.which; 
  if (code  == 13) {               
    e.preventDefault();
    return false;
  }
});
var win = $(window);
var wrapper = $('#page-content-wrapper').height();
win.resize(function() {
    $('#yardsale-map').height(win.height() - wrapper);
});

$(window).trigger('resize');

</script>
@stop