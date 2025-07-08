<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['nisn', 'name', 'email', 'class'];
// app/Models/Student.php

    public function academics()
    {
        return $this->hasMany(Academics::class);
    }
    public function bakats()
    {
        return $this->hasMany(Bakats::class);
    }

    public function minats()
    {
        return $this->hasMany(Minats::class);
    }

}
