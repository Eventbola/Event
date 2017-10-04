<?php

namespace App\Models;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class SaveEvent extends Model
{
    protected  $table='save_events';
    public function user(){
        $this->belongsTo(User::class);
    }

}
