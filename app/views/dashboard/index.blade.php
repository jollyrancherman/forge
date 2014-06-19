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
								@if(!$data['yardsale'] || $data['yardsale'] == '')

									<div class="alert alert-danger">
										<h3 style="margin-top: 0;"><i class="fa fa-exclamation-circle"></i> 
											You have not created a yardsale yet!
										</h3>
										<p>{{ link_to('/dashboard/yardsale', 'Click here') }} to create a new yardsale!</p>
									</div>
								@else
									<div class="alert alert-success">
										<h3 style="margin-top: 0;"><i class="fa fa-check"></i> 
											You have set up your yardsale.
										</h3>
										<p>{{ link_to('/dashboard/yardsale', 'Click here') }} to edit your yardsale.</p>
									</div>								
								@endif
							</div>
						</div>

						<div class="row">
							<div class="col-md-8 col-md-offset-2">

								@if($data['active'] == '0')
									<div class="alert alert-danger">
										<h3 style="margin-top: 0;"><i class="fa fa-exclamation-circle"></i> 
											You have not paid for registration yet
										</h3>
										<p>{{ link_to('/payment', 'Click here') }} to pay for registration. Registration is $12.</p>
									</div>								
								@endif

							</div>
						</div>

          </div>
        </div>
@stop