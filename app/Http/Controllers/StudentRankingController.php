<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use App\Models\Academics;
use App\Models\Bakats;
use App\Models\Student;
use App\Models\Minats;
use Illuminate\Http\Request;

class StudentRankingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $student = null;
        if ($search) {
            $student = Student::query()
                ->when($search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('nisn', 'like', '%' . $search . '%');
                })
                ->first();
        }

        $academic = Academics::where('student_id', optional($student)->id)->first();
        $bakat = Bakats::where('student_id', optional($student)->id)->first();
        $minat = Minats::where('student_id', optional($student)->id)->first();
        $academicPrograms = AcademicProgram::all();

        return view('rekom.index', compact('student', 'academic', 'bakat', 'minat', 'academicPrograms', 'search'));
    }
}
