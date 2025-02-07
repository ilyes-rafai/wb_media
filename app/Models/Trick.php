<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trick extends Model
{
    /** @use HasFactory<\Database\Factories\TrickFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function instructions()
    {
        return $this->hasMany(Instruction::class);
    }
}
