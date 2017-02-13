@extends('plans/layout')

@section('content')

<body>
  <h1>{{ $plan->title }}</h1>
  <hr>
  <h2>予定詳細/メモ</h2>
  <div style="height:150px; padding: 10px; margin-bottom: 10px; border: 5px double #333333; border-radius: 10px;">
    {{ $plan->body }}
  </div>

</body>

<div class="col-sm-12">
    <a href="/" class="btn btn-primary">ホームへ戻る</a>
</div>

@stop
