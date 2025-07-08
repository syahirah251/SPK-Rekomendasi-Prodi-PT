@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div>
            @include('includes.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="card mt-3 mb-4">
                <div class="card-header text-center">
                    <h1>Edit Semua Nilai</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('academics.update', $academic->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @php
                            // Subject fields mapping for semester inputs
                            $subjectFields = [
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
                        @endphp

                        @foreach($subjectFields as $subject => $fields)
                            <div class="mb-3">
                                <h4 class="mt-4">{{ strtoupper($subject) }}</h4>
                                <div class="row">
                                    @foreach($fields as $field)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label for="{{ $field }}">Semester {{ str_replace(['_smt', $subject], '', $field) }}</label>
                                                <input type="number" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $academic->$field }}" required>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
