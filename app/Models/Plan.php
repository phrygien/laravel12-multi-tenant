<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $table = 'plans';

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(PlanFeature::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'plan_modules');
    }
    
    public function has_module($module): bool
    {
       foreach ($this->modules as $m) {
           if ($m->name == $module) {
               return true;
           }
       }
       return false;
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}