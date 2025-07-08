<?php
namespace App\Imports;

use App\Models\Bakats;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BakatsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            try {
                // Log baris yang sedang diproses
                Log::info("Memproses baris ke-" . ($key + 1), $row->toArray());

                // Validasi data di setiap baris
                if (!isset($row['student_id']) || !Student::find($row['student_id'])) {
                    throw new \Exception("Student ID tidak valid pada baris ke-" . ($key + 1));
                }


                // Cek apakah data sudah ada
                $existingBakat = Bakats::where('student_id', $row['student_id'])->exists();
        
                if (!$existingBakat) {
                    // Buat data baru
                    Bakats::create([
                        'student_id' => $row['student_id'], // Menggunakan student_id yang valid
                        'linguistik' => isset($row['linguistik']) ? $row['linguistik'] : null,
                        'logis_matematis' => isset($row['logis_matematis']) ? $row['logis_matematis'] : null,
                        'visual_spasial' => isset($row['visual_spasial']) ? $row['visual_spasial'] : null,
                        'musikal' => isset($row['musikal']) ? $row['musikal'] : null,
                        'kinestetik' => isset($row['kinestetik']) ? $row['kinestetik'] : null,
                        'interpersonal' => isset($row['interpersonal']) ? $row['interpersonal'] : null,
                        'intrapersonal' => isset($row['intrapersonal']) ? $row['intrapersonal'] : null,
                        'naturalis' => isset($row['naturalis']) ? $row['naturalis'] : null,
                    ]);
                }
            } catch (\Exception $e) {
                // Log kesalahan di file log
                Log::error("Kesalahan pada baris ke-" . ($key + 1) . ": " . $e->getMessage());
            }
        }
    }
}
