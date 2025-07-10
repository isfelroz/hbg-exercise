<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Base extends Model
{
    protected $fillable = ['name'];

    public function pilots()
    {
        return $this->hasMany(Pilot::class);
    }
}
