<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $primaryKey = 'plan_id';

    // インサート/アップデート時の非更新項目の指定
    protected $guarded = ['plan_id'];

    public function scopeOfKey($query, $plan_id)
    {
      return $query->where('plan_id', $plan_id);
    }
}
