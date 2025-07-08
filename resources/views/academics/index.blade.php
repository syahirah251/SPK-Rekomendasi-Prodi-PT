@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div>
            @include('includes.sidebar')
        </div>
        <div class="col-md-10">
            <h1 class="text-center mt-3 mb-4">Daftar Nilai Siswa</h1>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <!-- Form Pencarian -->
                        <div class="col-md-6">
                            <form action="{{ route('academics.index') }}" method="GET" class="d-flex align-items-center">
                                <input 
                                    type="text" 
                                    name="search" 
                                    class="form-control me-2" 
                                    placeholder="Cari siswa (nama/NISN)" 
                                    value="{{ request('search') }}" 
                                />
                                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                            </form>
                        </div>

                        <!-- Form Upload File Excel -->
                        <div class="col-md-6">
                            <form action="{{ route('academics.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center mb-2">
                                    <input 
                                        type="file" 
                                        name="file" 
                                        class="form-control me-2" 
                                        accept=".xlsx,.xls,.csv"
                                        required
                                    />
                                    <button type="submit" class="btn btn-success btn-sm">Upload</button>
                                </div>
                            </form>
                            <!-- Button Download Template -->
                        
                        </div>
                        
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ asset('templates/NILAISISWA.xlsx') }}" class=" d-flex align-items-center  btn btn-info">
                            Download Template Akademik Excel
                        </a>
                    </div>
                </div>
            </div>

            @if(request('search') || request('student_id'))
            @php
                $student = null;
                if (request('student_id')) {
                    $student = App\Models\Student::find(request('student_id'));
                } elseif(request('search')) {
                    $student = App\Models\Student::where('name', 'like', '%' . request('search') . '%')
                                ->orWhere('nisn', 'like', '%' . request('search') . '%')
                                ->first();
                }
            @endphp
        
              
              @if($student)
                  <div class="card mb-4">
                      <div class="card-body">
                          <h4>Nama Siswa: {{ $student->name }}</h4>
                          <p>NISN: {{ $student->nisn }}</p>
                          <p>Kelas: {{ $student->class }}</p>
                          <d>id: {{ $student->id }}</d>

                      </div>
                  </div>
              @endif
          @endif


            <!-- Table of Academic Data (only shown if a student is selected) -->
            @if(request('student_id') || request('search'))
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">KODE MAPEL</th>
                            <th class="text-center">SMT 1</th>
                            <th class="text-center">SMT 2</th>
                            <th class="text-center">SMT 3</th>
                            <th class="text-center">SMT 4</th>
                            <th class="text-center">RATA RATA</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $subjects = [
                                    'PAI' => ['pai_smt1', 'pai_smt2', 'pai_smt3', 'pai_smt4'],
                                    
                                    'PKN' => ['ppkn_smt1', 'ppkn_smt2', 'ppkn_smt3', 'ppkn_smt4'],
                                    'BIN' => ['bin_smt1', 'bin_smt2', 'bin_smt3', 'bin_smt4'],
                                    'BIG' => ['big_smt1', 'big_smt2', 'big_smt3', 'big_smt4'],
                                    'MAT' => ['mat_smt1', 'mat_smt2', 'mat_smt3', 'mat_smt4',],
                                    'FIS' => ['fis_smt1', 'fis_smt2', 'fis_smt3', 'fis_smt4'],
                                    'KIM' => ['kim_smt1', 'kim_smt2', 'kim_smt3', 'kim_smt4'],
                                    'BIO' => ['bio_smt1', 'bio_smt2', 'bio_smt3', 'bio_smt4'],
                                    'SOS' => ['sosio_smt1', 'sosio_smt2', 'sosio_smt3', 'sosio_smt4'],
                                    'EKO' => ['eko_smt1', 'eko_smt2', 'eko_smt3', 'eko_smt4'],
                                    'SEJ' => ['sej_smt1', 'sej_smt2', 'sej_smt3', 'sej_smt4'],
                                    'GEO' => ['geo_smt1', 'geo_smt2', 'geo_smt3', 'geo_smt4'],
                                    'PJOK' => ['pjok_smt1', 'pjok_smt2', 'pjok_smt3', 'pjok_smt4'],
                                    'SENBUD' => ['senbud_smt1', 'senbud_smt2', 'senbud_smt3', 'senbud_smt4'],
                                    'MAT TL' => ['mat_tl_smt1', 'mat_tl_smt2', 'mat_tl_smt3', 'mat_tl_smt4'],
                                    'BJG' => ['bjg_smt1', 'bjg_smt2', 'bjg_smt3', 'bjg_smt4'],
                                    'BIG TL' => ['big_tl_smt1', 'big_tl_smt2', 'big_tl_smt3', 'big_tl_smt4'],
                                    'INFOR' => ['infor_smt1', 'infor_smt2', 'infor_smt3', 'infor_smt4'],
                                    'PKWU' => ['pkwu_smt1', 'pkwu_smt2', 'pkwu_smt3', 'pkwu_smt4'],
                                    'MULOK' => ['mulok_smt1', 'mulok_smt2', 'mulok_smt3', 'mulok_smt4'],     
                                ];
                                $academic = $academics->where('student_id', $student->id)->first() ?? null;
                            @endphp
                    
                            @foreach ($subjects as $subject => $columns)
                                @php
                                    $grades = array_map(fn($col) => $academic->$col, $columns);
                                    $average = collect($grades)->filter()->avg() ?? '0';
                                @endphp
                                <tr>
                                    <td>{{ $subject }}</td>
                                    @foreach ($grades as $grade)
                                        <td>{{ $grade }}</td>
                                    @endforeach
                                    <td>{{ $average }}</td>
                                    <td>
                                        <a href="{{ route('academics.edit', $academic->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('academics.destroy', $academic->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
              
                </table>
                
            @else
                <p class="text-center">Silakan pilih siswa untuk melihat nilai.</p>
            @endif
        </div>
    </div>
</div>
@endsection