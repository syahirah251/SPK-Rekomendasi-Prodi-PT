<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $student = null;

        $search = $request->input('search');
        
        // Query to get students, searching by name or NISN
        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('nisn', 'like', '%' . $search . '%');
        })->get();
    
        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }
    public function edit($id)
    {
        // Temukan siswa berdasarkan ID
        $student = Student::findOrFail($id);
    
        // Tampilkan view edit dengan data siswa
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'nisn'  => 'required|numeric|unique:students,nisn,' . $id,
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'class' => 'required|string|max:255',
    ]);

    // Cari siswa berdasarkan ID
    $student = Student::findOrFail($id);

    // Update data siswa
    $student->update($validated);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
}

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            // Validate uploaded file
            $request->validate([
                'file' => 'required|mimes:xlsx,csv|max:2048',
            ]);

            try {
                // Import data using StudentsImport
                Excel::import(new StudentsImport, $request->file('file'));
                return redirect()->route('students.index')->with('success', 'Data berhasil diimport.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Kesalahan saat mengupload file: ' . $e->getMessage());
            }
        }

        // Handle manual input if file is not uploaded
        $request->validate([
            'id' => 'required|unique:students',
            'nisn' => 'required|nullable|min:0|max:100',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'class' => 'required|string|max:255',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
