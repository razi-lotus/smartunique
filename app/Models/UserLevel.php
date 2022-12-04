<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'user_level';
    public static $snakeAttributes = false;
    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function levelName(){
        return $this->hasOne(Levels::class,'id','current_level_id');
    }
}
