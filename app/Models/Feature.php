<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name', 'description', 'status'];

    public function plans()
    {
        return $this->belongsToMany(Plan::class)->withPivot('limit')->withTimestamps();
    }
}
