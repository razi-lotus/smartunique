<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBalTransfer extends Model
{
    protected $table = 'user_balance_transfer';
    public static $snakeAttributes = false;
    protected $guarded;

    public function received_user(){
        return $this->hasOne(User::class,'id','transfer_to');
    }

    public function from_user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
