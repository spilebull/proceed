@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1">
  <div class="panel panel-default">
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation" class="active">
        <a href="#cover" data-toggle="tab">表紙</a>
      </li>
      <li role="presentation">
        <a href="#share" data-toggle="tab">共有</a>
      </li>
      <li role="presentation">
        <a href="#minute" data-toggle="tab">議事録</a>
      </li>
    </ul>

    <div id="tabs-content" class="tab-content">
      <div class="tab-pane fade in active" id="cover">
        @include('minute.show_cover')
      </div>
      <div class="tab-pane fade" id="share">
        @include('minute.show_share')
      </div>
      <div class="tab-pane fade" id="minute">
        @include('minute.show_minute')
      </div>
    </div>
  </div>

  <div class="pull-right col-md-6 col-md-offset-4">
    <button class="btn btn-danger pull-right" type="submit" name="pdf">
      <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF
    </button>
  </div>
</div>
@stop

@section('endbody')
@parent
@stop
