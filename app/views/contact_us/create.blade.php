@extends('layout.main_layout')

@section('content')
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i>Menu</button>
          </p>
<div class="container">
  <div class="row">
    <form>
            <fieldset>
                <input type="text" id="name" name="name" class="input-block-level" placeholder="Name">
                <input type="text" id="email" name="email" class="input-block-level" placeholder="Email">
                <textarea rows="3" id="description" name="description" class="input-block-level" placeholder="Description"></textarea>
                <button type="submit" class="btn btn-warning pull-right">Submit</button>
            </fieldset>
        </form>
  </div>
</div>
      </div>
@stop