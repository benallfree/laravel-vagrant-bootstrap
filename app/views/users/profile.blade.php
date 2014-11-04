@extends('layout')

@section('content')
    <div class='col-md-6 col-md-offset-3'>
      <div class="panel panel-default">
        <div class="panel-body">
          {{ BootForm::open()->action(action('users.profile')) }}
              {{ BootForm::text('Screen Name', 'screen_name') }}
              {{ BootForm::submit("Let's Bang >") }}
          {{ BootForm::close() }}
        </div>
      </div>
    </div>
  </div>
@stop