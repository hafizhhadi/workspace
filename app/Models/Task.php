<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'name',
        'status',
        'description',
        'date',
    ];
    
    public function workspaces()
    {
        return $this->belongsTo(Workspace::class,'workspace_id');
    }
    public function getDueDateAttribute()
    {
        return Carbon::parse($this->date)->format('Y/m/d');
    }
    public function getDueTimeAttribute()
    {
        return Carbon::parse($this->date)->diffForHumans();
    }
}
