@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Minutes</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="text-left">
                        <tr>
                            <th><i class="fa fa-calendar-o" aria-hidden="true"></i> 日付</th>
                            <th><i class="fa fa-file-text-o" aria-hidden="true"></i> 文書名</th>
                            <th><i class="fa fa-user" aria-hidden="true"></i> 担当</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($relations as $relation)
                        <tr>
                            <td>{{ $relation->date }}</td>
                            <td><a href="minutes/{{ $relation->id }}">{{ $relation->doc }}</a></td>
                            <td>{{ $relation->last_name . '　' . $relation->first_name }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $relation->id }}">
                                    <button type="button" class="btn btn-danger" value="{{ $relation->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Check -->
                        <div class="modal fade" id="deleteModal{{ $relation->id }}">
                            <div class="modal-dialog">
                                <!-- Modal Content -->
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title alert alert-danger">以下の内容が削除されます。宜しいですか？</h4>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <p>{{ $relation->date }}</p>
                                        <p>{{ $relation->doc }}</p>
                                    </div>
                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        {!! Form::open(['method'=>'DELETE', 'url'=>['/', $relation->id]]) !!}
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-danger" value="OK">
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div><!-- Modal Check End -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel-footer">
            Next User　
            <i class="fa fa-hand-o-right" aria-hidden="true"></i>
            <mark>{{ $nextuser }}</mark>
        </div>
    </div>
</div>
@stop

@section('endbody')
@parent
<script>
jQuery(function($) {
  // jQueryの処理
});
</script>
@stop
