<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Foreign key referencing 'students' table, cascades on delete
            $table->integer('pai_smt1')->nullable();
            $table->integer('pai_smt2')->nullable();
            $table->integer('pai_smt3')->nullable();
            $table->integer('pai_smt4')->nullable();

            $table->integer('ppkn_smt1')->nullable();
            $table->integer('ppkn_smt2')->nullable();
            $table->integer('ppkn_smt3')->nullable();
            $table->integer('ppkn_smt4')->nullable();

            $table->integer('bin_smt1')->nullable();
            $table->integer('bin_smt2')->nullable();
            $table->integer('bin_smt3')->nullable();
            $table->integer('bin_smt4')->nullable();

            $table->integer('big_smt1')->nullable();
            $table->integer('big_smt2')->nullable();
            $table->integer('big_smt3')->nullable();
            $table->integer('big_smt4')->nullable();

            $table->integer('mat_smt1')->nullable();
            $table->integer('mat_smt2')->nullable();
            $table->integer('mat_smt3')->nullable();
            $table->integer('mat_smt4')->nullable();
            
            $table->integer('fis_smt1')->nullable();
            $table->integer('fis_smt2')->nullable();
            $table->integer('fis_smt3')->nullable();
            $table->integer('fis_smt4')->nullable();

            $table->integer('kim_smt1')->nullable();
            $table->integer('kim_smt2')->nullable();
            $table->integer('kim_smt3')->nullable();
            $table->integer('kim_smt4')->nullable();

            $table->integer('bio_smt1')->nullable();
            $table->integer('bio_smt2')->nullable();
            $table->integer('bio_smt3')->nullable();
            $table->integer('bio_smt4')->nullable();

            $table->integer('sosio_smt1')->nullable();
            $table->integer('sosio_smt2')->nullable();
            $table->integer('sosio_smt3')->nullable();
            $table->integer('sosio_smt4')->nullable();
            
            $table->integer('geo_smt1')->nullable();
            $table->integer('geo_smt2')->nullable();
            $table->integer('geo_smt3')->nullable();
            $table->integer('geo_smt4')->nullable();

            $table->integer('eko_smt1')->nullable();
            $table->integer('eko_smt2')->nullable();
            $table->integer('eko_smt3')->nullable();
            $table->integer('eko_smt4')->nullable();

            $table->integer('sej_smt1')->nullable();
            $table->integer('sej_smt2')->nullable();
            $table->integer('sej_smt3')->nullable();
            $table->integer('sej_smt4')->nullable();

            $table->integer('pjok_smt1')->nullable();
            $table->integer('pjok_smt2')->nullable();
            $table->integer('pjok_smt3')->nullable();
            $table->integer('pjok_smt4')->nullable();
        
            $table->integer('senbud_smt1')->nullable();
            $table->integer('senbud_smt2')->nullable();
            $table->integer('senbud_smt3')->nullable();
            $table->integer('senbud_smt4')->nullable();

            $table->integer('mat_tl_smt1')->nullable();
            $table->integer('mat_tl_smt2')->nullable();
            $table->integer('mat_tl_smt3')->nullable();
            $table->integer('mat_tl_smt4')->nullable();

            $table->integer('bjg_smt1')->nullable();
            $table->integer('bjg_smt2')->nullable();
            $table->integer('bjg_smt3')->nullable();
            $table->integer('bjg_smt4')->nullable();


            $table->integer('big_tl_smt1')->nullable();
            $table->integer('big_tl_smt2')->nullable();
            $table->integer('big_tl_smt3')->nullable();
            $table->integer('big_tl_smt4')->nullable();

    
            $table->integer('infor_smt1')->nullable();
            $table->integer('infor_smt2')->nullable();
            $table->integer('infor_smt3')->nullable();
            $table->integer('infor_smt4')->nullable();

            $table->integer('pkwu_smt1')->nullable();
            $table->integer('pkwu_smt2')->nullable();
            $table->integer('pkwu_smt3')->nullable();
            $table->integer('pkwu_smt4')->nullable();
            
            $table->integer('mulok_smt1')->nullable();
            $table->integer('mulok_smt2')->nullable();
            $table->integer('mulok_smt3')->nullable();
            $table->integer('mulok_smt4')->nullable();
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academics');
    }
};
