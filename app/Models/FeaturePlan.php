<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturePlan extends Model
{
    protected $table = 'feature_plan';

    protected $fillable = [
        'plan_id',
        'feature_id',
        'limit'
    ];
}
