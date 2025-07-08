<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

use App\Models\Academics;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AcademicsImport;

class AcademicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get(key: 'search');

        $academics = Academics::with('student')
            ->when($search, function ($query, $search) {
                $query->whereHas('student', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('nisn', 'like', "%{$search}%");
                });
            })
            ->get();

        $subjects = [
            'PAI', 'PPKN', 'BIN', 'MAT', 'FIS', 'KIM',
            'BIO', 'SOSIO', 'EKO', 'SEJ', 'GEO', 'BIG',
            'PJOK', 'SENBUD', 'MAT TL', 'BJG', 'BIG TL', 'INFOR', 'PKWU', 'MULOK'
        ];

        return view('academics.index', compact('academics', 'subjects'));
    }

    public function create()
    {
        $students = Student::all();
        return view('academics.create', compact('students'));
    }

    public function store(Request $request)
{
    if ($request->hasFile('file')) {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:2048',
        ]);
    
        try {
            // Log untuk memastikan file diterima
            Log::info('File upload diterima: ' . $request->file('file')->getClientOriginalName());
    
            // Import file menggunakan Excel
            Excel::import(new AcademicsImport, $request->file('file'));
    
            return redirect()->route('academics.index')->with('success', 'Data Akademik berhasil diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // Tangani validasi pada Excel
            $failures = $e->failures();
            $errorMessage = "Kesalahan validasi pada file Excel:";
            foreach ($failures as $failure) {
                $errorMessage .= " Baris {$failure->row()}: " . implode(', ', $failure->errors());
            }
            return redirect()->back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Tangani kesalahan umum lainnya
            Log::error('Kesalahan upload file: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload file: ' . $e->getMessage());
        }
    }

    return redirect()->back()->with('error', 'File tidak ditemukan.');
}

    

    public function edit($id)
    {
        $academic = Academics::findOrFail($id);
        $subject = request('subject', 'pai'); // Default ke 'pai' jika tidak ada parameter
        return view('academics.edit', compact('academic', 'subject'));
    }

    public function update(Request $request, $id)
{
    $academic = Academics::findOrFail($id);

    foreach ($request->all() as $key => $value) {
        if (Schema::hasColumn('academics', $key)) {
            $academic->$key = $value;
        }
    }

    $academic->save();

    return redirect()->route('academics.index')->with('success', 'Nilai akademik berhasil diperbarui.');
}


    public function destroy($id)
    {
        $academic = Academics::findOrFail($id);
        $academic->delete();

        return redirect()->route('academics.index')->with('success', 'Nilai akademik berhasil dihapus.');
    }
}