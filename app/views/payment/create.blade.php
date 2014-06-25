@extends('layout.main_layout')

@section('content')
            
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2>Payment</h2>
								<p>You’ve made it to the final step. Registration is $12, with $10 going to Big Brothers Big Sisters of Northern Nevada and $2 going to yard sale signs. Enter your credit card information to finalize (registration is nonrefundable).</p>

								<div class="col-sm-8">
									{{ Form::open(['class' => 'form-horizontal', 'id' => 'billing-form']) }}
										<div class="error-msg col-sm-offset-3"></div>

										<!-- Name -->
									  <div class="form-group">
									    <label for="cardholder_name" class="col-sm-3 control-label">Cardholders Name</label>
									    <div class="col-sm-9">
									      <input type="text" name="name" class="form-control" id="cardholder_name" placeholder="Cardholders Name" data-stripe="name">
									    </div>
									  </div>

										<!-- CARD Number -->
									  <div class="form-group">
									    <label for="card_number" class="col-sm-3 control-label">Card Number</label>
									    <div class="col-sm-9">
									      <input type="text" class="form-control" id="card_number" placeholder="Card Number" data-stripe="number">
									    </div>
									  </div>
										
										<!-- CVC Number -->
									  <div class="form-group">
									    <label for="CVC" class="col-sm-3 control-label">CVC</label>
									    <div class="col-sm-4">
									      <input type="text" class="form-control" id="CVC" placeholder="CVC" data-stripe="cvc">
									    </div>
									  </div>

									  <div class="form-group">
									    <label for="expires" class="col-sm-3 control-label">Expiration</label>
									    <div class="col-sm-5">
									      {{ Form::selectMonth(null,null,['class' => 'form-control', 'id' => 'expires', 'data-stripe' => 'exp-month']) }}
									    </div>
									    <div class="col-sm-4">
									      {{ Form::selectYear(null,date('Y'),date('Y') + 10,null,['class' => 'form-control', 'data-stripe' => 'exp-year']) }}
									    </div>
									  </div>
									  
									  <input type="hidden" id="publishable-key" value="{{ Config::get('stripe.publishable_key') }}" >

									  <!-- SUBMIT -->
									  {{ Form::submit('Pay for Registration!', array('class' => 'btn btn-primary col-sm-offset-3 col-sm-9')) }}
									  

									{{ Form::close() }}
								</div>

							</div>
						</div>	

          </div>
        </div>
@stop



@section('scripts-top')
<meta name="publishable-key" value="{{ Config::get('stripe.publishable_key') }}">

@stop



@section('scripts-bot')
<script src="https://js.stripe.com/v2/"></script>
<script src="/js/billing.js"></script>

@stop