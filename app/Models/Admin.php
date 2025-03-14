<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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


}
