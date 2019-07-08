<div class="panel-body">
    <div class="table-wrapper">
        <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-small-font table-striped table-hover table-bordered">
                <thead class="text-left">
                    <tr>
                        <th>チケット番号</th>
                        <th data-priority="1">プロジェクト</th>
                        <th data-priority="1">題名</th>
                        <th data-priority="1">担当者</th>
                        <th data-priority="1">バージョン</th>
                        <th data-priority="1">説明</th>
                        <th>議事録</th>
                        <th>メモ欄</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                  @foreach ($minutes as $value)
                    <tr>
                      <td>{{ '#'. $value->ticket_id }}</td>
                      <td>{{ $value->project }}</td>
                      <td>{{ $value->subject }}</td>
                      <td>{{ $value->assigned_to }}</td>
                      <td>{{ $value->version }}</td>
                      <td>{{ $value->description }}</td>
                      <td>{{ $value->minute }}</td>
                      <td>{{ $value->memo }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('endbody')
@parent
<script type="text/javascript">
$(function() {
});
</script>
@stop
