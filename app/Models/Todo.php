<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    protected $appends = [
        'done',
    ];

    public function getDoneAttribute()
    {
        return $this->completed_at ? true : false;
    }

    public function scopeCompleted($query)
    {
        return $query->whereNotNull('completed_at');
    }

    public function scopeNotCompleted($query)
    {
        return $query->whereNull('completed_at');
    }
}
