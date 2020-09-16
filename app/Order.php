<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function tasks()
    {
        return $this->belongsTo(OrderTask::class);
    }
}
