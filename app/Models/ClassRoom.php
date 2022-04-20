<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function unpinStudents($students)
    {
        foreach ($students as $student) {
            $student->update([
                "name" => $student->name,
                "class_room_id" => null,
            ]);
        }
    }
}
