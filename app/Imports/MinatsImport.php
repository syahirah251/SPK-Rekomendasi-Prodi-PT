<?php
namespace App\Imports;

use App\Models\Minats;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MinatsImport implements ToCollection, WithHeadingRow
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
                $existingMinat = Minats::where('student_id', $row['student_id'])->exists();

                if (!$existingMinat) {
                    // Buat data baru
                    Minats::create([
                        'student_id' => $row['student_id'],
                        'realistik' => $row['realistik'] ?? 0,
                        'investigatif' => $row['investigatif'] ?? 0,
                        'artistik' => $row['artistik'] ?? 0,
                        'sosial' => $row['sosial'] ?? 0,
                        'enterprising' => $row['enterprising'] ?? 0,
                        'konvensional' => $row['konvensional'] ?? 0,
                    ]);
                }
            } catch (\Exception $e) {
                // Log kesalahan di file log
                Log::error("Kesalahan pada baris ke-" . ($key + 1) . ": " . $e->getMessage());
            }
        }
    }
}
