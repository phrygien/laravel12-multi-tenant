<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanModule extends Model
{
    protected $table = 'plan_modules';

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}