@extends('layout.main_layout')

@section('content')
            
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2>You have been logged in!</h2>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								@if(!Session::get('yardsale.created'))

									<div class="alert alert-danger">
										<h3 style="margin-top: 0;"><i class="fa fa-exclamation-circle"></i> 
											You have not created a yardsale yet!
										</h3>
										<p>{{ link_to('/dashboard/yardsale', 'Click here') }} to create a new yardsale!</p>
									</div>
								@else
									<div class="alert alert-success clearfix">
										<h3 style="margin-top: 0;"><i class="fa fa-check"></i> 
											You have set up your yardsale.
										</h3>
										<p style="margin-bottom: 5px;">{{ link_to('/dashboard/yardsale', 'Click here') }} to edit your yardsale.</p>
										Your yardsale is: <button class="btn btn-primary" value='{{ $visible->visible }}' id="toggleVisible">Visible</button>
									</div>								
								@endif
							</div>
						</div>

						<div class="row">
							<div class="col-md-8 col-md-offset-2">

								@if(!Session::get('yardsale.active'))
									<div class="alert alert-danger">
										<h3 style="margin-top: 0;"><i class="fa fa-exclamation-circle"></i> 
											You have not yet paid for registration. No worries, easy fix.
										</h3>
										<p>{{ link_to('/payment', 'Click here') }} to pay the $12 (and make your yard sale visible to shoppers).</p>
									</div>								
								@endif

							</div>
						</div>

          </div>
        </div>
@stop

@section('scripts-bot')
<script>
function toggleYardsale (data) {
	if(data == '1'){
		btnState.val('0').addClass('btn-danger').removeClass('btn-primary').text('hidden (click to show)');
	}else{
		btnState.val('1').addClass('btn-primary').removeClass('btn-danger').text('visible (click to hide)');
	}
}

var btnState = $('#toggleVisible');

toggleYardsale(btnState.val());

btnState.on('click',function () {

 	$.ajax({
		url: '/yardsale/hide',
		type: 'POST',
		dataType: 'json',
		data:{visible:btnState.val()},
		success: function(data){
			toggleYardsale(data);
    }
  });
});

</script>
@stop