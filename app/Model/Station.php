<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Station extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name', 'description'];

    public function previousStation()
    {
        return $this->belongsTo(__CLASS__, 'prev_station_id', 'id')->withDefault();
    }

    public function nextStation()
    {
        return $this->belongsTo(__CLASS__, 'next_station_id', 'id')->withDefault();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
