<?php
namespace App\Imports;

use App\Models\Academics;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AcademicsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            try {
                // Log baris yang sedang diproses
                Log::info("Memproses baris ke-" . ($key + 1), $row->toArray());

                // Validasi Student ID
                if (empty($row['student_id']) || !Student::find($row['student_id'])) {
                    throw new \Exception("Student ID tidak valid atau tidak ditemukan pada baris ke-" . ($key + 1));
                }

                // Ambil data yang ada, isi nilai default untuk kolom kosong
                $data = [
                    'student_id' => $row['student_id'],
                    'pai_smt1' => $row['pai_smt1'] ?? null,
                    'pai_smt2' => $row['pai_smt2'] ?? null,
                    'pai_smt3' => $row['pai_smt3'] ?? null,
                    'pai_smt4' => $row['pai_smt4'] ?? null,

                    'ppkn_smt1' => $row['ppkn_smt1'] ?? null,
                    'ppkn_smt2' => $row['ppkn_smt2'] ?? null,
                    'ppkn_smt3' => $row['ppkn_smt3'] ?? null,
                    'ppkn_smt4' => $row['ppkn_smt4'] ?? null,
                    
                    'bin_smt1' => $row['bin_smt1'] ?? null,
                    'bin_smt2' => $row['bin_smt2'] ?? null,
                    'bin_smt3' => $row['bin_smt3'] ?? null,
                    'bin_smt4' => $row['bin_smt4'] ?? null,

                    'big_smt1' => $row['big_smt1'] ?? null,
                    'big_smt2' => $row['big_smt2'] ?? null,
                    'big_smt3' => $row['big_smt3'] ?? null,
                    'big_smt4' => $row['big_smt4'] ?? null,

                    'mat_smt1' => $row['mat_smt1'] ?? null,
                    'mat_smt2' => $row['mat_smt2'] ?? null,
                    'mat_smt3' => $row['mat_smt3'] ?? null,
                    'mat_smt4' => $row['mat_smt4'] ?? null,
                    
                    'fis_smt1' => $row['fis_smt1'] ?? null,
                    'fis_smt2' => $row['fis_smt2'] ?? null,
                    'fis_smt3' => $row['fis_smt3'] ?? null,
                    'fis_smt4' => $row['fis_smt4'] ?? null,

                    'kim_smt1' => $row['kim_smt1'] ?? null,
                    'kim_smt2' => $row['kim_smt2'] ?? null,
                    'kim_smt3' => $row['kim_smt3'] ?? null,
                    'kim_smt4' => $row['kim_smt4'] ?? null,

                    'bio_smt1' => $row['bio_smt1'] ?? null,
                    'bio_smt2' => $row['bio_smt2'] ?? null,
                    'bio_smt3' => $row['bio_smt3'] ?? null,
                    'bio_smt4' => $row['bio_smt4'] ?? null,

                    'sosio_smt1' => $row['sosio_smt1'] ?? null,
                    'sosio_smt2' => $row['sosio_smt2'] ?? null,
                    'sosio_smt3' => $row['sosio_smt3'] ?? null,
                    'sosio_smt4' => $row['sosio_smt4'] ?? null,

                    'eko_smt1' => $row['eko_smt1'] ?? null,
                    'eko_smt2' => $row['eko_smt2'] ?? null,
                    'eko_smt3' => $row['eko_smt3'] ?? null,
                    'eko_smt4' => $row['eko_smt4'] ?? null,

                    'sej_smt1' => $row['sej_smt1'] ?? null,
                    'sej_smt2' => $row['sej_smt2'] ?? null,
                    'sej_smt3' => $row['sej_smt3'] ?? null,
                    'sej_smt4' => $row['sej_smt4'] ?? null,

                    'geo_smt1' => $row['geo_smt1'] ?? null,
                    'geo_smt2' => $row['geo_smt2'] ?? null,
                    'geo_smt3' => $row['geo_smt3'] ?? null,
                    'geo_smt4' => $row['geo_smt4'] ?? null,

                    'pjok_smt1' => $row['pjok_smt1'] ?? null,
                    'pjok_smt2' => $row['pjok_smt2'] ?? null,
                    'pjok_smt3' => $row['pjok_smt3'] ?? null,
                    'pjok_smt4' => $row['pjok_smt4'] ?? null,

                    'senbud_smt1' => $row['senbud_smt1'] ?? null,
                    'senbud_smt2' => $row['senbud_smt2'] ?? null,
                    'senbud_smt3' => $row['senbud_smt3'] ?? null,
                    'senbud_smt4' => $row['senbud_smt4'] ?? null,

                    'mat_tl_smt1' => $row['mat_tl_smt1'] ?? null,
                    'mat_tl_smt2' => $row['mat_tl_smt2'] ?? null,
                    'mat_tl_smt3' => $row['mat_tl_smt3'] ?? null,
                    'mat_tl_smt4' => $row['mat_tl_smt4'] ?? null,

                    'bjg_smt1' => $row['bjg_smt1'] ?? null,
                    'bjg_smt2' => $row['bjg_smt2'] ?? null,
                    'bjg_smt3' => $row['bjg_smt3'] ?? null,
                    'bjg_smt4' => $row['bjg_smt4'] ?? null,

                    'big_tl_smt1' => $row['big_tl_smt1'] ?? null,
                    'big_tl_smt2' => $row['big_tl_smt2'] ?? null,
                    'big_tl_smt3' => $row['big_tl_smt3'] ?? null,
                    'big_tl_smt4' => $row['big_tl_smt4'] ?? null,

                    'infor_smt1' => $row['infor_smt1'] ?? null,
                    'infor_smt2' => $row['infor_smt2'] ?? null,
                    'infor_smt3' => $row['infor_smt3'] ?? null,
                    'infor_smt4' => $row['infor_smt4'] ?? null,

                    'pkwu_smt1' => $row['pkwu_smt1'] ?? null,
                    'pkwu_smt2' => $row['pkwu_smt2'] ?? null,
                    'pkwu_smt3' => $row['pkwu_smt3'] ?? null,
                    'pkwu_smt4' => $row['pkwu_smt4'] ?? null,

                    'mulok_smt1' => $row['mulok_smt1'] ?? null,
                    'mulok_smt2' => $row['mulok_smt2'] ?? null,
                    'mulok_smt3' => $row['mulok_smt3'] ?? null,
                    'mulok_smt4' => $row['mulok_smt4'] ?? null,
                    // Tambahkan semua kolom lainnya sesuai struktur database Anda
                ];

                // Periksa apakah data dengan student_id sudah ada
                $existingAcademics = Academics::where('student_id', $data['student_id'])->first();

                if ($existingAcademics) {
                    // Update data yang sudah ada
                    $existingAcademics->update($data);
                } else {
                    // Buat data baru
                    Academics::create($data);
                }
            } catch (\Exception $e) {
                // Log error tanpa menghentikan proses
                Log::error("Kesalahan pada baris ke-{$key}: {$e->getMessage()}");
            }
        }
    }
}
