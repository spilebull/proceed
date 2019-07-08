<br />
<div class="panel-body">

    <div class="table-wrapper">
        <div class="btn-toolbar">
            <div class="btn-group focus-btn-group">
                <input id="files" type="file" style="display:none">
                <div class="col-xs-4 input-group input-group-sm">
                    <input type="text" id="filePath" class="form-control" placeholder="Please select a file...">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info" onclick="$('input[id=files]').click();">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>

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
                <tbody id="contents" class="text-left">

                </tbody>
            </table>
        </div>
    </div>
</div>

@section('endbody')
@parent
<script src="{{asset('/assets/js/jquery.csv.js')}}"></script>
<script src="{{asset('/assets/js/jquery.csv.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.csv.file.handle.js')}}"></script>
<script src="{{asset('/assets/js/rwd-table.js')}}"></script>
<script type="text/javascript">
$(function() {
    // File Path 表示
    $('input[id=files]').change(function() {
        $('#filePath').val($(this).val());
    });

    // テーブル チェック表示／非表示
    $('.table-responsive').responsiveTable({
        // addDisplayAllBtn: false,
        addFocusBtn: false,
    });

    // $('#group-minutes').responsiveTable('update');
});
</script>
@stop
