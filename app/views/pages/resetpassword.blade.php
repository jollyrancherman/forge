@extends('layout.main_layout')

@section('content')            
        	<!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <h3>Enter your new password</h3>
                <p class="lead">After you complete this step you may log in with your new password!</p>
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