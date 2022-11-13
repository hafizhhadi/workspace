<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

