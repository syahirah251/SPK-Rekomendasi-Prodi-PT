<?php
namespace App\Exports;

use App\Models\Academics;
use Maatwebsite\Excel\Concerns\ToModel;

class AcademicsExport implements ToModel
{
    public function model(array $row)
    {
        // Return a new Academic record from the Excel row data
        return new Academics([
            'student_id' => $row[0],  // Example: adjust indices based on your Excel columns
            'pai_smt1' => $row[1],
            'pkn_smt1' => $row[2],
            // Add other columns as needed
        ]);
    }
}
