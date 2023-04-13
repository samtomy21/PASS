<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name_dependence',
    ];
    
    public function passes()
    {
        return $this->hasMany(Pass::class);
    }
    
}
