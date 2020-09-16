<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'time',
    ];
    public $timestamps = false;

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
