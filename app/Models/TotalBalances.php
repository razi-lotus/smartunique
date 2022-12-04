<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalBalances extends Model
{
    protected $table = 'total_balances';
    public static $snakeAttributes = false;
    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
