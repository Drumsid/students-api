<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic', 'description'
    ];

    public function classRoom()
    {
        return $this->belongsToMany(ClassRoom::class);
    }
}
