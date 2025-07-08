<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakats extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 
        // bakat
        'linguistik','logis_matematis',	'visual_spasial',	'musikal',	'kinestetik',	'interpersonal',	'intrapersonal',	'naturalis',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
