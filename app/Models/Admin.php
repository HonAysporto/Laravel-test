<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Admin extends Model
// {

//     public function getJWTIdentifier() {
//         return $this->getKey();
//         } 
//        public function getJWTCustomClaims() {
//         return []; 
//        }
       
    

//     protected $fillable = [
//         "first_name",
//         "last_name",
//         "email",
//         "phone_number",
//         "address",
//         "department",
//         "roles",
//         "permission",
//         "password"
//     ]; 


// }


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "phone_number",
        "address",
        "department",
        "roles",
        "permission",
        "password"
    ]; 

    /**
     * Get the identifier that will be stored in the JWT.
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    } 

    /**
     * Return a key value array, containing any custom claims.
     */
    public function getJWTCustomClaims() {
        return []; 
    }
}


