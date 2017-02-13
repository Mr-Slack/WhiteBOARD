<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    protected $primaryKey = 'staff_id';

    // インサート/アップデート時の非更新項目の指定
    protected $guarded = ['staff_id'];

}
