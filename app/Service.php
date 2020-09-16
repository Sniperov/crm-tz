<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'description', 'price',
    ];

    public $timestamps = false;

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
