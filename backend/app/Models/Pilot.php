<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    protected $fillable = ['name', 'base_id'];

    public function base()
    {
        return $this->belongsTo(Base::class);
    }
}
