<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $table = 'bonus';
    public static $snakeAttributes = false;
    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
