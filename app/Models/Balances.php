<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balances extends Model
{
    use HasFactory;

    protected $table = 'balances';
    // protected $fillable = ['user_id','amount','points'];
    public static $snakeAttributes = false;

    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ref_user(){
        return $this->hasOne(User::class,'id','refered_id');
    }
}
