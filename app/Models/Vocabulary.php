<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    /** @use HasFactory<\Database\Factories\VocabularyFactory> */
    use HasFactory;

    protected $guarded = [];
}
