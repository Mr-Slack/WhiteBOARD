@extends('plans/layout')

@section('script')
$(function(){
    $(".btn-destroy").click(function(){
        if(confirm("予定を削除します、よろしいですか？")){
            //submit（削除）
        }else{
            //cancel
            return false;
        }
    });
});
@stop

@section('content')

  <div style="border: 5px double #0CF; padding: 10px;">
    <p>【課題】</p>
    <p>①laravelでサブクエリ</p>
    <p>②フォームエラー時の入力項目の保持→解決</p>
    <p>③ログイン認証（ユーザー登録）</p>
    <p>④同一社員の予定の表示（仕様）→Viewにロジックを持たせる嫌な感じで一旦回避</p>
    <p>⑤帰社時間登録</p>
    <p>⑥当日以外の予定表示</p>
  </div>
  <h1 class="text-primary">{{ $today }}</h1>
  @if(Session::get('flash_message'))
    <div class="alert alert-success alert-dismissible" role="alert">
	     <button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
	      {{ session('flash_message') }}
    </div>
  @endif

  <div class="row">
    <div class="col-sm-12">
      <a href="/create" class="btn btn-primary" style="margin:20px;">予定登録</a>
    </div>
  </div>

  <table class="table table-striped">
    <tr class="success">
      <td>社員名</td>
      <td>予定タイトル</td>
      <td>開始時間</td>
      <td>終了時間</td>
      <td></td>
      <td></td>
    </tr>
    <?php $pre_staff_name = ''; ?>
    @foreach($plans as $plan)
        <tr>
          <td>
            @if($plan->staff_name != $pre_staff_name)
              {{ $plan->staff_name }}
            @endif
          </td>
          <td>{{ $plan->title }}</td>
          <td>{{ $plan->plan_start_time }}</td>
          <td>{{ $plan->plan_end_time }}</td>
          <td><a href="/{{ $plan->plan_id }}" class="btn btn-primary btn-sm">予定詳細</a></td>
          <td>
            <form action="/delete/{{ $plan->plan_id }}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <input class="btn btn-danger btn-sm btn-destroy" type="submit" value="予定削除">
            </form>
          </td>
        </tr>
        <?php $pre_staff_name = $plan->staff_name; ?>
    @endforeach
  </table>

@stop
