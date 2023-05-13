<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dependence extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name_dependence',
    ];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
