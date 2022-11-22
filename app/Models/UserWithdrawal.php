<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawal extends Model
{
    protected $table = 'user_withdrawals';
    public static $snakeAttributes = false;
    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
