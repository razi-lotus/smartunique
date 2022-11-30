<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkRequest extends Model
{
    protected $table = 'work_requests';
    public static $snakeAttributes = false;
    protected $guarded;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
