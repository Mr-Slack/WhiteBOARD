<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{

  public function index()
  {
    $plans = DB::table('staffs')
      ->where('plans.plan_date', '=' , date('Y-m-d'))
      ->leftjoin('plans', 'staffs.staff_id', '=', 'plans.staff_id')
      ->select('plans.plan_id', 'staffs.staff_name','plans.title','plans.plan_start_time','plans.plan_end_time')
      ->orderBy('staffs.staff_id','DESC')
      ->orderBy('plans.plan_start_time','ASC')
      ->get();

    $w = date("w");
    $week = array('日', '月', '火', '水', '木', '金', '土');
    $today = date("Y/m/d") . '(' . ($week[$w]) . ')';

    return view('plans.index')->with('plans',$plans)->with('today',$today);
  }

  public function show($plan_id)
  {
    $plan = Plan::findOrFail($plan_id);
    return view('plans.detail')->with('plan',$plan);
  }

  public function destroy($id)
  {
      $plan = Plan::findOrFail($id);
      $plan->delete();
      return redirect('/')->with('flash_message','予定を削除しました。');
  }

  public function create()
  {
    //予定登録画面ビューへ転送
    return view('plans.create');
  }

  public function store(Request $request)
  {
    //バリデーションの実装

    //評価対象
    $inputs = $request->all();

    //バリデーションルール
    $rules = [
      'date' => 'required|after:yesterday',
      'startTime' => 'required|',
      'endTime' => 'required|after:startTime',
      'title'=> 'required|min:5|max:255',
    ];

    //エラーメッセージ
    $messages = [
      'date.required' => '予定日は必須です',
      'date.after' => '予定日は当日以降で入力可能です',
      'startTime.required' => '開始時間は必須です',
      'endTime.required' => '終了時間は必須です',
      'endTime.after' => '終了時刻が開始時刻より前です',
      'title.required'=> 'タイトルは必須です',
      'title.min' => 'タイトルは５文字以上で入力してください',
      'title.max' => 'タイトルは50文字以内で入力してください'
    ];

    $validation = \Validator::make($inputs,$rules,$messages);

    //エラー次の処理
    if($validation->fails())
    {
      return redirect()->back()->withErrors($validation->errors())->withInput();
    }

    $plan = new Plan();
    $plan->staff_id = '2';
    $plan->plan_date = $request->date;
    $plan->plan_start_time = $request->startTime;
    $plan->plan_end_time = $request->endTime;
    $plan->title = $request->title;
    $plan->body  = $request->body;
    $plan->save();

    return redirect('/')->with('flash_message','予定を登録しました。');
  }

  public function edit($id)
  {
    $plan = Plan::findOrFail($id);
    return view('plans.edit')->with('plan',$plan);
  }

  public function update(Request $pr, $id)
  {
    $plan = Plan::findOrFail($id);
    $plan->title = $pr->title;
    $plan->body  = $pr->body;
    $plan->save();
    return redirect('/'.$id)->with('flash_message','Article Updated.');
  }

}
