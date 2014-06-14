@extends('layout.main_layout')

@section('content')
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset"> 
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
              <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i> Go Back</a><br />
								<h2>{{ $data->title }}</h2>
								<p class="lead">{{ $data->address }}</p>
								<p>{{nl2br($data->description)}}</p>
								<div id="yardsale-map" style="height: 400px;"></div>
							</div>

						</div>	

						<div class="row">
							<div class="col-md-6 col-md-offset-2">
                <div id="links">
                @foreach($images as $image)
                    <a href="public/garageSale/{{ $data->user_id }}/{{ basename($image) }}" title="{{ $data->address }}" data-gallery>
                        <img src="public/garageSale/{{ $data->user_id }}/thumbnail/{{ basename($image) }}" alt="{{ $data->address }}">
                    </a>
                @endforeach
                </div>
                <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
                <div id="blueimp-gallery" class="blueimp-gallery">
                    <!-- The container for the modal slides -->
                    <div class="slides"></div>
                    <!-- Controls for the borderless lightbox -->
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                    <!-- The modal dialog, which will be used to wrap the lightbox content -->
                    <div class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body next"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left prev">
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                        Previous
                                    </button>
                                    <button type="button" class="btn btn-primary next">
                                        Next
                                        <i class="glyphicon glyphicon-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
							</div>
						</div>
          </div>
        </div>


@stop

@section('scripts-top')
<!-- GOOGLE MAPS API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<!-- BLUEIMP GALLERY -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="/css/blueimp-image-gallery.css">
<link rel="stylesheet" href="/css/demo-gallery.css">
@stop

@section('scripts-bot')
<!-- BLUEIMP SCRIPTS -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="/js/bootstrap-image-gallery.js"></script>

<script>
function initialize() {
  var lat = '{{ $data->lat }}';
  var lng = '{{ $data->lng }}';

  var myLatlng = new google.maps.LatLng(lat, lng);
  var mapOptions = {
    zoom: 16,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('yardsale-map'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '{{ $data->address }}'
  });

  marker.setIcon(/** @type {google.maps.Icon} */({
    url: '/img/signWithShadowMarker.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(99, 66),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(20,60)
  }));  
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
@stop