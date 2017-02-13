<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // モデルに対応するテーブル名
    // Laravel命名規則に法っている場合は自動マッピングが行われる
    //TODO 命名規則とは?
    protected $table = 'articles';

    // インサート/アップデート時の非更新項目の指定
    protected $guarded = ['id'];
}
