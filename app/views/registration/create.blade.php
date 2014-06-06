@extends('layout.main_layout')

@section('content')
            
          <!-- Keep all page content within the page-content inset div! -->
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h2>Why not sign up?</h2>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <p>More details on what is going on. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, commodi, delectus, labore veritatis eveniet possimus error distinctio alias aut dicta minima accusantium illo unde officiis ut dolorum deleniti laboriosam similique?</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">           
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

                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
@stop