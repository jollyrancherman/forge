@extends('layout.main_layout')

@section('content')            
        	<!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <p class="lead">Need a your password reset? We can help! Just enter the email address you used to register with us and we will send you an email with instructions on how to reset your password. It's that simple.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
                {{ Form::open() }}
                  <!-- Email -->
                  <div class="form-group">
                    {{ Form::label('email', 'Email:', ['class' => 'control_label']) }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                  </div>
                  
                  <!-- SUBMIT -->
                  {{ Form::submit('Reset Password', array('class' => 'btn btn-primary')) }}
                  
                 {{ Form::close() }} 
                
              </div>
            </div>
          </div>
        </div>
@stop