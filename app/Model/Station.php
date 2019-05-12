<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'logo', 'description'];

    public function previousStation(){
        return $this->belongsTo(__CLASS__,'prev_station_id','id')->withDefault();
    }

    public function nextStation(){
        return $this->belongsTo(__CLASS__,'next_station_id','id')->withDefault();
    }
}
