<?php

namespace App\Models\Gateway;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class GatewayTransaction extends Model
{
    /*--------------------Relations--------------------*/
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
