<div class="panel-body">
    {{-- Date --}}
    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
      <label for="date" class="col-xs-2 col-sm-2 col-md-2 control-label">
        <p class="text-right">日付</p>
      </label>
      <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="input-group bfh-datepicker-toggle" data-format="y-m-d" data-toggle="bfh-datepicker">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-calendar"></i>
          </span>
          <input id="datepicker" class="form-control" type="text" name="date" value="{{ old('date') }}" placeholder="YYYY-MM-DD" />
        </div>
        @if ($errors->has('date'))
          <span class="help-block">
            <strong>{{ $errors->first('date') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- Time --}}
    <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
      <label for="start_time" class="col-xs-2 col-sm-2 col-md-2 control-label">
        <p class="text-right">時間</p>
      </label>
      <div class="col col-xs-6 col-sm-6 col-md-6">
        <div class="input-group bfh-datepicker-toggle" data-format="HH-mm" data-toggle="bfh-datepicker">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-time"></i>
          </span>
          {{-- Start Time --}}
          <input id="starttimepicker" class="form-control" type="text" name="start_time" value="16:30" placeholder="HH:mm" required />
          <span class="input-group-addon">
            <i>〜</i>
          </span>
          {{-- End Time --}}
          <input id="endtimepicker" class="form-control" type="text" name="end_time" value="18:00" placeholder="18:00" required />
        </div>
        @if ($errors->has('start_time'))
          <span class="help-block">
            <strong>{{ $errors->first('start_time') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- Area --}}
    <div class="form-group{{ $errors->has('area') ? 'has-error' : '' }}">
      <label for="date" class="col-xs-2 col-sm-2 col-md-2 control-label">
        <p class="text-right">場所</p>
      </label>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <select name="area" id="area" class="form-control">
          <option value="渋谷ビル　9A　会議室">渋谷ビル　9A　会議室</option>
          <option value="渋谷ビル　9B　会議室" selected>渋谷ビル　9B　会議室</option>
          <option value="渋谷ビル　9C　会議室">渋谷ビル　9C　会議室</option>
        </select>
        @if ($errors->has('area'))
          <span class="help-block">
            <strong>{{ $errors->first('area') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- Attendee --}}
    <div class="form-group">
      <label for="attendee" class="col-xs-2 col-sm-2 col-md-2 control-label">
        <p class="text-right">出席者</p>
      </label>
      <div class="col col-xs-9 col-sm-9 col-md-9">
        @foreach ($users as $user)
          <label class="checkbox-inline">
            <input type="checkbox" name="{{ 'attendee[' . $user->id .']' }}" value="{{ $user->id }}" checked>
            {{ $user->last_name .' '. $user->first_name }}
          </label>
        @endforeach
      </div>
    </div>

    {{-- Secretary --}}
    <div class="form-group{{ $errors->has('secretary') ? 'has-error' : '' }}">
      <label for="date" class="col-xs-2 col-sm-2 col-md-2 control-label">
        <p class="text-right">書記</p>
      </label>
      <div class="col col-xs-3 col-sm-3 col-md-3">
        <select name="secretary" id="secretary" class="form-control">
          @foreach ($secretaries as $secretary)
            <option value="{{ $secretary->id }}">
              {{ $secretary->last_name . ' ' . $secretary->first_name }}
            </option>
          @endforeach
        </select>
        @if ($errors->has('secretary'))
          <span class="help-block">
            <strong>{{ $errors->first('secretary') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- Distribute --}}
    <div class="form-group{{ $errors->has('distribute') ? 'has-error' : '' }}">
      <label for="date" class="col col-xs-2 col-sm-2 col-md-2 control-label">
        <p class="text-right">配布先</p>
      </label>
      <div class="col col-xs-6 col-sm-6 col-md-6">
        <select name="distribute" id="distribute" class="form-control">
          <option value="サービスシステム開発部　中島、放送システム課" selected>サービスシステム開発部　中島、放送システム課</option>
          <option value="サービスシステム開発部　放送システム課">サービスシステム開発部　放送システム課</option>
        </select>
        @if ($errors->has('distribute'))
          <span class="help-block">
            <strong>{{ $errors->first('distribute') }}</strong>
          </span>
        @endif
      </div>
    </div>
  </div>

@section('endbody')
@parent
<script src="{{asset('/assets/js/moment-with-locales.js')}}"></script>
<script src="{{asset('/assets/js/moment.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript">
$(function(){
    $('#datepicker').datetimepicker({ format: 'YYYY-MM-DD' });
    $('#starttimepicker').datetimepicker({ format: 'HH:mm' });
    $('#endtimepicker').datetimepicker({ format: 'HH:mm' });
});
</script>
@stop
