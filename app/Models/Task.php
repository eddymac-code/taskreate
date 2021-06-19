<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'start_time',
        'end_time',
        'completed',
    ];

    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
