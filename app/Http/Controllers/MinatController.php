<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Imports\MinatsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Minats;
use App\Models\Student; // Assuming there's a related 'Student' model

class MinatController extends Controller
{
    // Display all 'minat' records
    public function index(Request $request)
    {
        // Ambil semua data minat dengan relasi ke student
        $query = Minats::with('student');
    
        // Filter jika ada pencarian
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('nisn', 'like', '%' . $request->search . '%');
            });
        }
    
        $minats = $query->paginate(10); // Data dengan pagination
    
        return view('minat.index', compact('minats'));
    }
    
    // Show the form to create a new record
    public function create()
    {
        $students = Student::all(); // Load students for dropdown
        return view('minat.create', compact('students'));
    }

    // Store a new 'minat' record
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
            Excel::import(new MinatsImport, $request->file('file'));

            return redirect()->route('minat.index')->with('success', 'Data bakat berhasil diimport.');
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


    // Show the form to edit a 'minat' record
    public function edit($id)
    {
        $minat = Minats::with('student')->findOrFail($id); // Mengambil data dengan relasi student
        return view('minat.edit', compact('minat'));
    }
    
    public function update(Request $request, $id)
    {
        $minat = Minats::findOrFail($id);
    
        $request->validate([
            'linguistik' => 'nullable|integer|min:0|max:100',
            'realistik' => 'nullable|integer',
            'investigatif' => 'nullable|integer',
            'artistik' => 'nullable|integer',
            'sosial' => 'nullable|integer',
            'enterprising' => 'nullable|integer',
            'konvensional' => 'nullable|integer',
        ]);
    
        // Update data
        $minat->update(attributes: $request->only([
            'linguistik', 'realistik', 'investigatif',
            'artistik', 'enterprising', 'konvensional',
            'sosial'

            
        ]));
    
        return redirect()->route('minat.index')->with('success', 'Data berhasil diperbarui.');
    }
    

    // Delete a 'minat' record
    public function destroy(Minats $minat)
    {
        $minat->delete();
        return redirect()->route('minat.index')->with('success', 'Data Minat berhasil dihapus.');
    }
}
