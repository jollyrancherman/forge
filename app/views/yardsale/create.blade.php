@extends('layout.main_layout')

@section('content')
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset"> 
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2>Create your post here</h2>
								<p>optional text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, dolor, quisquam eligendi commodi ipsa dolore quasi totam quae corporis! Eum quam deserunt est sequi hic adipisci alias veniam sed recusandae.</p>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6 col-md-offset-2">
								
								{{ Form::open(['id' => 'fileupload']) }}

								<p>Dropdown</p>
									
								<!-- Google Maps -->
								<div class="form-group">
									<div id="yardsale-map" style="height: 300px;"></div>
								  {{ Form::label('address', 'Select address from drop-down', ['class' => 'control_label']) }}
								  {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'pac-input']) }}
								</div>
								
								<!-- Title -->
								<div class="form-group">
								  {{ Form::label('title', 'Title', ['class' => 'control_label']) }}
								  {{ Form::text('title', null, ['class' => 'form-control']) }}
								</div>
								
								<!-- Description -->
								<div class="form-group">
								  {{ Form::label('description', 'Description', ['class' => 'control_label']) }}
								  {{ Form::textarea('description', null, ['class' => 'form-control']) }}
								</div>
								
				        <!-- Redirect browsers with JavaScript disabled to the origin page -->
				        <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
				        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
				        <div class="row fileupload-buttonbar">
				            <div class="col-lg-7">
				                <!-- The fileinput-button span is used to style the file input field as button -->
				                <span class="btn btn-success fileinput-button">
				                    <i class="glyphicon glyphicon-plus"></i>
				                    <span>Add files...</span>
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

								<p>terms and condtions / No refunds / still need to pay if they have not</p>
								
								<!-- HIDDEN -->
				        {{ Form::hidden('folder_id', $postID, ['class' => 'form-control']) }}
				        {{ Form::hidden('lat',null, ['class' => 'form-control', 'id' =>'lat']) }}
				        {{ Form::hidden('lng',null, ['class' => 'form-control', 'id' => 'lng']) }}

								<!-- SUBMIT -->
								{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
								

							</div>
						</div>

          </div>
        </div>
@stop

@section('scripts-top')
<!-- GOOGLE MAPS API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

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
@stop

<!-- Scripts -->
<!-- Google Maps Scripts-->
<!-- Blue Imp File upload scripts -->
@section('scripts-bot')
<script>
function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(-33.8688, 151.2195),
    zoom: 13
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
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
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

$('#fileupload').bind("keyup keypress", function(e) {
  var code = e.keyCode || e.which; 
  if (code  == 13) {               
    e.preventDefault();
    return false;
  }
});
</script>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>		
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->	
@stop