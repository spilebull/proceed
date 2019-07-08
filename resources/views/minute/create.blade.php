@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('minutes') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="col-md-10 col-md-offset-1">
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
        <div id="cover" class="tab-pane fade in active"><br />
          @include('minute.create_cover')
        </div>
        <div id="share" class="tab-pane fade">
          @include('minute.create_share')
        </div>
        <div id="minute" class="tab-pane fade">
          @include('minute.create_minute')
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="pull-right col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-btn fa-thumbs-o-up"></i> Create
        </button>
      </div>
    </div>
  </div>
</form>
@stop

@section('endbody')
@parent
<script type="text/javascript">
$(function(){
});
</script>
@stop
