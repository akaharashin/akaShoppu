<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    function detailtransaksi() {
        return $this->hasMany(Detailtransaksi::class);
    }

    function user() {
        return $this->hasOne(User::class);
    }
}
