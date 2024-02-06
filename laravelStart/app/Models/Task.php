<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'user_id',
        'completed'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getCompletedTasks(){
        return self::where('user_id',auth()->id())
            ->where('completed',true)
            ->get();
    }

    public static function getTasks(){
        return self::where('user_id',auth()->id())
            ->where('completed',false)
            ->get();
    }
}
