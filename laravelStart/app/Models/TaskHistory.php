<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'user_id',
    ];

    protected $hidden = [

    ];

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public static function getTasksHistory(){
        return self::where('user_id',auth()->id())->get();
    }
}
