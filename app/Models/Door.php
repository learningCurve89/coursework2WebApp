<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * Each door may be assigned to a single zone.
     *
     */
    public function zone(){
        return $this->belongsTo('\App\Models\Zone');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * A user can be given explicit access to use a door.
     * A user can have access to many explicit doors. A door can have many users.
     *
     */
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

}
