@extends('plans/layout')

@section('content')

<h1 class="text-primary">新規予定登録画面</h1>
<br/>
<br/>
<form method="post" action="/store">

  <div class="form-group @if(!empty($errors->first('date'))) has-error @endif">
    <div class="container">
      <div class="col-md-6">
        <label>予定日</label>
        <input type="date" name="date" value="" class="form-control">
        <span class="help-block">{{ $errors->first('date') }}</span>
      </div>
    </div>
  </div>

  <div class="form-group @if(!empty($errors->first('startTime')) || !empty($errors->first('endTime'))) has-error @endif">
    <div class="container">
      <div class="col-md-6">
        <label>予定時間</label><br/>
        開始時間:<input type="time" name="startTime" step="600">
        終了時間：<input type="time" name="endTime" step="600">
        <span class="help-block">
          {{ $errors->first('startTime') }}
          @if(!empty($errors->first('startTime')))<br/>@endif
          {{ $errors->first('endTime') }}
        </span>
      </div>
    </div>
  </div>

  <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
    <div class="container">
      <div class="col-md-6">
        <label>予定タイトル</label>
        <input type="text" name="title" value="" class="form-control">
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="container">
      <div class="col-md-8">
        <label>予定詳細</label>
        <textarea name="body" value="" class="form-control" cols="20" rows="10"></textarea>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="container">
      <div class="col-md-4">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="登録" class="btn btn-primary">
        <a href="/" class="btn btn-primary">ホームへ戻る</a>
      </div>
    </div>
  </div>

</form>

@stop
