@extends('layout.main_layout')

@section('content')
            
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2>Hosts with the most, sign in here!</h2>
              </div>
              <div class="col-md-8 col-md-offset-2">
                <p class="lead">If you have already created your account, then you are </p>
                  <ul  class="list-unstyled" style="padding-left: 20px;">
                    <li class="lead">1) awesome, and</li>
                    <li class="lead">2) in the right place.</li>
                  </ul>
              <p  class="lead">If you want to change any of your information, then you came to the right place. You know what to do. Thanks again for supporting the event and the Big Brothers Big Sisters of Northern Nevada.</p>
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
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                {{ link_to('/passwordreset', 'Reset your password here',['class' => 'pull-right']) }}

                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
@stop