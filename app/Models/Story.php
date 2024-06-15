<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table="Story";

    protected $casts=['categories'=>'array'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
