<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'name',

    ];
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_modules');
    }

}
