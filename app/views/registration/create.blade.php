@extends('layout.main_layout')

@section('content')
            
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2>Host a Yard Sale </h2>
              </div>
              <div class="col-md-8 col-md-offset-2">
                <p class="lead">It seems you are ready to commit to a yard sale in your city! Register by entering your email and create a password below. We will send you a confirmation email to finish up this easy process.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-md-offset-2">           
                {{ Form::open() }}
      
                <!-- Email -->
                <div class="form-group">
                  {{ Form::label('email', 'Email', ['class' => 'control_label']) }}
                  {{ Form::text('email', null, ['class' => 'form-control']) }}
                  {{ $errors->first('email', '<p class="error-msg">:message</p>'); }}
                  <span class="error"></span>
                </div>
                
                <!-- PASSWORD -->
                <div class="form-group">
                  {{ Form::label('password', 'Password', array('class' => 'control_label')) }}
                  {{ Form::password('password', array('class' => 'form-control')) }}
                  {{ $errors->first('password', '<p class="error-msg">:message</p>'); }}
                </div>
                
                <!-- SUBMIT -->
                {{ Form::submit('create my account', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
@stop