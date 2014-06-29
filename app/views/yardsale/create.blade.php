@extends('layout.main_layout')

@section('content')
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset"> 
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2>Create your yard sale.</h2>
								<p>This is where the fun begins! Just enter all pertinent information below. The description will be where you share with potential shoppers why they want to stop by your yard sale. Maybe you are selling antiques, or great furniture and appliances; whatever it is, be sure to let them know, along with the time your yard sale will be open to the pubilc. The photo upload is available to give shoppers a preview of items you will be selling. </p>
                <p><span class="error-msg">* Required Fields</span></p>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6 col-md-offset-2">
								
								{{ Form::model($yardsale, ['id' => 'fileupload', 'files' => true]) }}

                <!-- FIELD -->
                <div class="form-group">
                  <span class="error-msg">*</span>
                  {{ Form::label('city', 'Select Your City', ['class' => 'control_label']) }}
                  {{ Form::select('area', $dataArray, null, ['class' => 'form-control','id' => 'city'])}}
                  {{ $errors->first('area', '<p class="error-msg">:message</p>') }} 
                </div> 
									
								<!-- Google Maps -->
								<div class="form-group">
									<div id="yardsale-map" style="height: 300px;"></div>

                  <label for="address" class="control_label">
                    <span class="error-msg">*</span>Address
                    <span class="small">
                      (Type in and pick your address from the dropdown menu)
                    </span>
                  </label>
								  {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'pac-input']) }}
                  {{ $errors->first('address', '<p class="error-msg">:message</p>') }}
								</div>


								<!-- Title -->
								<div class="form-group">
								  <span class="error-msg">*</span>
                  {{ Form::label('title', 'Title (yard sale, estate sale, ect)', ['class' => 'control_label']) }}
								  {{ Form::text('title', null, ['class' => 'form-control']) }}
                  {{ $errors->first('title', '<p class="error-msg">:message</p>') }}
								</div>
								
								<!-- Description -->
								<div class="form-group">
								  {{ Form::label('description', 'Description (include details on items and hours.)', ['class' => 'control_label']) }}
								  {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'textarea-return']) }}
                  {{ $errors->first('description', '<p class="error-msg">:message</p>'); }}
								</div>
								
				        <!-- Redirect browsers with JavaScript disabled to the origin page -->
				        <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
				        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
				        <div class="row fileupload-buttonbar">
                    <div class="col-md-12">
                    <h4>Upload Images</h4>
				                <!-- The fileinput-button span is used to style the file input field as button -->
				                <span class="btn btn-success fileinput-button">
				                    <i class="glyphicon glyphicon-plus"></i>
				                    <span>Add Images...</span>
				                    <input type="file" name="files[]" multiple>
				                </span>
				                <button type="submit" class="btn btn-primary start">
				                    <i class="glyphicon glyphicon-upload"></i>
				                    <span>Start upload</span>
				                </button>
				                <button type="reset" class="btn btn-warning cancel">
				                    <i class="glyphicon glyphicon-ban-circle"></i>
				                    <span>Cancel upload</span>
				                </button>
				                <button type="button" class="btn btn-danger delete">
				                    <i class="glyphicon glyphicon-trash"></i>
				                    <span>Delete</span>
				                </button>
				                <input type="checkbox" class="toggle">
				                <!-- The global file processing state -->
				                <span class="fileupload-process"></span>
				            </div>
				            <!-- The global progress state -->
				            <div class="col-lg-5 fileupload-progress fade">
				                <!-- The global progress bar -->
				                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
				                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
				                </div>
				                <!-- The extended global progress state -->
				                <div class="progress-extended">&nbsp;</div>
				            </div>
				        </div>
				        <!-- The table listing the files available for upload/download -->
				        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>

                <p>By clicking submit you are agreeing to host a righteous yard sale... and to our {{ link_to_route('tos', 'terms and conditions') }}.</p> 
                <p>Uploading this form does not yet register your yard sale; you must also pay the $12 registration fee.</p>
                <p><strong>We can't help to mention that Big Brothers Big Sisters of Northern Nevada receives $10 from each yard sale registered.</strong></p>
								
								<!-- HIDDEN -->
                {{ Form::hidden('lng', $yardsale->lng , ['class' => 'form-control', 'id' => 'lng']) }}
				        {{ Form::hidden('lat', $yardsale->lat , ['class' => 'form-control', 'id' =>'lat']) }}

								<!-- SUBMIT -->
								{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
								

							</div>
						</div>

          </div>
        
        <!-- The blueimp Gallery widget -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
@stop

@section('scripts-top')
<!-- GOOGLE MAPS API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
@stop

@section('scripts-bot')
<script>
function initialize() {

  var lat = $('#lat').val();
  var lng = $('#lng').val();

  var myLatlng = new google.maps.LatLng(lat,lng);

  var mapOptions = {
    center: myLatlng,
    zoom: 15
  };
  var map = new google.maps.Map(document.getElementById('yardsale-map'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

    // marker.setIcon(/** @type {google.maps.Icon} */({
    //   url: place.icon,
    //   size: new google.maps.Size(71, 71),
    //   origin: new google.maps.Point(0, 0),
    //   anchor: new google.maps.Point(17, 34),
    //   scaledSize: new google.maps.Size(35, 35)
    // }));

  if(lat !== '' && lng !== ''){
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: '/img/signWithShadowMarker.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      size: new google.maps.Size(99, 66),
      // The origin for this image is 0,0.
      origin: new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      anchor: new google.maps.Point(20,60)
    }));
    marker.setPosition(myLatlng);
    marker.setVisible(true);   
  }

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    //select the lat and lng of the location entered.
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();

    $("#lat").val(lat);
    $("#lng").val(lng);

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
    url: '/img/signWithShadowMarker.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      size: new google.maps.Size(99, 66),
      // The origin for this image is 0,0.
      origin: new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      anchor: new google.maps.Point(20,60)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

// $('#fileupload').bind("keyup keypress", function(e) {
//   var code = e.keyCode || e.which; 
//   if (code  == 13) {               
//     e.preventDefault();
//     return false;
//   }
// });
function preventEnterSubmit(e) {
    if (e.which == 13) {
        var $targ = $(e.target);

        if (!$targ.is("textarea") && !$targ.is(":button,:submit")) {
            var focusNext = false;
            $(this).find(":input:visible:not([disabled],[readonly]), a").each(function(){
                if (this === e.target) {
                    focusNext = true;
                }
                else if (focusNext){
                    $(this).focus();
                    return false;
                }
            });

            return false;
        }
    }
}
</script>

@stop