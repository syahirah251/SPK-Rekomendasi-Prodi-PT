<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minats extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 
        // minat
        'realistik', 'investigatif', 'artistik', 'sosial', 'enterprising', 'konvensional'

    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
