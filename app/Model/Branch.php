<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name', 'color'];

    public $timestamps = false;

    public function stations(){
        return $this->belongsToMany(Station::class);
    }
}
