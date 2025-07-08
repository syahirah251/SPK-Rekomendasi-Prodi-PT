<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use Illuminate\Http\Request;

class AcademicProgramController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel academic_programs
        $programs = AcademicProgram::all();

        // Kirim data ke view
        return view('prodi.index', compact('programs'));
    }
}
