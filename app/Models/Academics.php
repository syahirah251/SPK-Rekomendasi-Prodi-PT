<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academics extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 
        // PAI subjects per semester
        'pai_smt1', 'pai_smt2', 'pai_smt3', 'pai_smt4', 
    
        // PKN subjects per semester
        'ppkn_smt1', 'ppkn_smt2', 'ppkn_smt3', 'ppkn_smt4', 
    
        // Bahasa Indonesia (BIN) subjects per semester
        'bin_smt1', 'bin_smt2', 'bin_smt3', 'bin_smt4', 
        
        'big_smt1', 'big_smt2', 'big_smt3', 'big_smt4', 
    
        // Mathematics (MTK) subjects per semester
        'mat_smt1', 'mat_smt2', 'mat_smt3', 'mat_smt4', 
    
        // Physics (Fisika) subjects per semester
        'fis_smt1', 'fis_smt2', 'fis_smt3', 'fis_smt4', 
    
        // Chemistry (Kimia) subjects per semester
        'kim_smt1', 'kim_smt2', 'kim_smt3', 'kim_smt4', 
    
        // Biology (Biologi) subjects per semester
        'bio_smt1', 'bio_smt2', 'bio_smt3', 'bio_smt4', 
    
        // Sociology (Sosio) subjects per semester
        'sosio_smt1', 'sosio_smt2', 'sosio_smt3', 'sosio_smt4',

        'eko_smt1', 'eko_smt2', 'eko_smt3', 'eko_smt4',

        'sej_smt1', 'sej_smt2', 'sej_smt3', 'sej_smt4', 
        // Geography (Geo) subjects per semester
        'geo_smt1', 'geo_smt2', 'geo_smt3', 'geo_smt4', 
    
        // Physical Education (PJOK) subjects per semester
        'pjok_smt1', 'pjok_smt2', 'pjok_smt3', 'pjok_smt4', 

        'senbud_smt1', 'senbud_smt2', 'senbud_smt3', 'senbud_smt4', 
        'mat_tl_smt1', 'mat_tl_smt2', 'mat_tl_smt3', 'mat_tl_smt4', 
        'bjg_smt1', 'bjg_smt2', 'bjg_smt3', 'bjg_smt4', 
        'big_tl_smt1', 'big_tl_smt2', 'big_tl_smt3', 'big_tl_smt4', 
    
        // Information Technology (Info) subjects per semester
        'infor_smt1', 'infor_smt2', 'infor_smt3', 'infor_smt4', 
    
        // Entrepreneurship (PKWU) subjects per semester
        'pkwu_smt1', 'pkwu_smt2', 'pkwu_smt3', 'pkwu_smt4', 
    
        // Mulok subjects per semester
        'mulok_smt1', 'mulok_smt2', 'mulok_smt3', 'mulok_smt4', 
    ];
    
  
    // Relationship to Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
