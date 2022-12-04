<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBalance extends Model
{
    protected $table = 'admin_balances';
    public static $snakeAttributes = false;

    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
