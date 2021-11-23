<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * A zone can contain multiple doors.
     * Each door may be assigned to a zone.
     *
     */
    public function doors(){
        return $this->hasMany('App\Models\Door');
    }

    /**
     * A user who is granted access to a zone has access to all doors in the zone.
     */
    public function users(){
        return $this->belongsToMany('\App\Model\User');
    }
}
