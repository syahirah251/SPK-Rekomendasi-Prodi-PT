<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    /**
     * Handle the imported rows from the Excel file.
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key === 0) continue; // Skip header row
    
            // Pastikan bahwa baris memiliki data yang cukup
            if (!isset($row[0], $row[1], $row[2], $row[3], $row[4])) {
                continue; // Lewati baris jika ada kolom yang tidak lengkap
            }
    
            // Check if the student already exists by NISN
            $existingStudent = Student::where('nisn', $row[1])->exists();
    
            if (!$existingStudent) {
                Student::create([
                    'id' => $row[0],
                    'nisn' => $row[1],
                    'name' => $row[2],
                    'email' => $row[3],
                    'class' => $row[4],
                ]);
            }
        }
    }
    
}
