<div class="panel-body">
  {{-- Date --}}
  <div class="row">
    <label for="date" class="col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">日付</p>
    </label>
    <p class="text-left col-xs-10 col-sm-10 col-md-10">
      {{ $covers->date }}
    </p>
  </div>

  {{-- Time --}}
  <div class="row">
    <label for="time" class="col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">時間</p>
    </label>
    <p class="text-left col-xs-10 col-sm-10 col-md-10">
      {{ $covers->start_time }} 〜 {{ $covers->end_time }}
    </p>
  </div>

  {{-- Area --}}
  <div class="row">
    <label for="area" class="col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">場所</p>
    </label>
    <p class="text-left col-xs-10 col-sm-10 col-md-10">
      {{ $covers->area }}
    </p>
  </div>

  {{-- Attendee --}}
  <div class="row">
    <label for="attendee" class="col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">出席者</p>
    </label>
    <p class="text-left col-xs-10 col-sm-10 col-md-10">
      {{ $covers->attendee }}
    </p>
  </div>

  {{-- Secretary --}}
  <div class="row">
    <label for="secretary" class="col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">書記</p>
    </label>
    <p class="text-left col-xs-10 col-sm-10 col-md-10">
      {{ $covers->last_name .'　'. $covers->first_name }}
    </p>
  </div>

  {{-- Distribute --}}
  <div class="row">
    <label for="distribute" class="col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">配布先</p>
    </label>
    <p class="text-left col-xs-10 col-sm-10 col-md-10">
      {{ $covers->distribute }}
    </p>
  </div>

  {{-- Doc Number --}}
  <div class="row">
    <label for="doc" class="col col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">文書番号</p>
    </label>
    <div class="col col-xs-10 col-sm-10 col-md-10">
      <p class="text-left">{{ $covers->doc_no }}</p>
    </div>
  </div>

  {{-- Doc --}}
  <div class="row">
    <label for="doc" class="col col-xs-2 col-sm-2 col-md-2 control-label">
      <p class="text-right">文書名</p>
    </label>
    <div class="col col-xs-10 col-sm-10 col-md-10">
      <p class="text-left">{{ $covers->doc }}</p>
    </div>
  </div>
</div>
