<?php

namespace App\Http\Controllers;

use App\Models\Bakats;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BakatsImport;
use Illuminate\Support\Facades\Log;

class BakatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $bakats = Bakats::with('student')
            ->when($search, function ($query, $search) {
                $query->whereHas('student', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                             ->orWhere('nisn', 'like', "%{$search}%");
                });
            })
            ->get();
    
        return view('bakat.index', compact('bakats'));
    }
    
    public function create()
    {
        $students = Student::all();
        return view('bakat.create', compact('students'));
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
                Excel::import(new BakatsImport, $request->file('file'));
    
                return redirect()->route('bakat.index')->with('success', 'Data bakat berhasil diimport.');
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
        $bakat = Bakats::findOrFail($id);
        $students = Student::all();
        return view('bakat.edit', compact('bakat', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',


            'linguistik' => 'nullable|integer',
            'logis_matematis' => 'nullable|integer',
            'visual_spasial' => 'nullable|integer',
            'musikal' => 'nullable|integer',
            'kinestetik' => 'nullable|integer',
            'interpersonal' => 'nullable|integer',
            'intrapersonal' => 'nullable|integer',
            'Naturalis' => 'nullable|integer',
        ]);

        $bakat = Bakats::findOrFail($id);
        $bakat->update($request->all());

        return redirect()->route('bakat.index')->with('success', 'Bakat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bakat = Bakats::findOrFail($id);
        $bakat->delete();

        return redirect()->route('bakat.index')->with('success', 'Bakat berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new BakatsImport, $request->file('file'));

        return redirect()->route('bakat.index')->with('success', 'Data bakat berhasil diimport');
    }
}
