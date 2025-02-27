<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PlanFeature extends Model
{
    protected $table = 'plan_features';

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}