<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Time;

class Pass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'motive',
        'place',
        'observation',
        'estado',
        'time_id',
        'input',
        'output',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
    
}
