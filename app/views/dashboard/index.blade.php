@extends('layout.main_layout')

@section('content')
            
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2>Hey, it worked! <span class="small"> You're logged in.</span></h2>
								<p class="lead">Now you can create and update your yard sale information, just clicking "{{ link_to('/dashboard/yardsale', 'My yard sale') }}" to the left. </p>
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
										<p style="margin-bottom: 20px;" class="lead"><strong><i class="fa fa-check"></i> Your yard sale has been set up.</strong> {{ link_to('/dashboard/yardsale', 'Click here') }} to edit it.</p>
										<p  style="margin-bottom: 10px;" >"Hiding" your yard sale prevents it from being listed for shoppers to see. You may find this useful if you no longer can participate in the sale or don't want your yard sale listed for whatever reason. Change your mind? No problem, you can make it visible again.</p>
										<p>
											<button class="btn btn-primary" value='{{ $visible->visible }}' id="toggleVisible"></button>
										</p>
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
		btnState.val('0').addClass('btn-danger').removeClass('btn-success').text('Hide my yard sale');
	}else{
		btnState.val('1').addClass('btn-success').removeClass('btn-danger').text('Show my yard sale');
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