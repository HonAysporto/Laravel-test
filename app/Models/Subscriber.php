<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Subscriber extends Authenticatable implements JWTSubject

{
    protected $fillable = [
      "subscriber_name",
      "address",
      "subscriber_id",
      'subscription_date',
      "subscription_expiring_date",
      "subscription_status"
    ];


    public function getJWTIdentifier() {
        return $this->getKey();
    } 

    /**
     * Return a key value array, containing any custom claims.
     */
    public function getJWTCustomClaims() {
        return []; 
    }

    public function admins() : HasMany {
        return $this->hasMany(Admin::class);
    }
}
