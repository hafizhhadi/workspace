<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'name',
        'status',
        'description',
        'dateline',
    ];
    
    public function workspaces()
    {
        return $this->belongsTo(Workspace::class,'workspace_id');
    }
}
