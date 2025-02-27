<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Relation pour récupérer les modules accessibles via le plan
     */
    public function modules(): HasManyThrough
    {
        return $this->hasManyThrough(Module::class, Plan::class, 'id', 'id', 'plan_id', 'id');
    }
}