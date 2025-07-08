<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    use HasFactory;
    protected $fillable = ['program_studi', 'mata_pelajaran_pendukung', 'bakat', 'minat'];

}
