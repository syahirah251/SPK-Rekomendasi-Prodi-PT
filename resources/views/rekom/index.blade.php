@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="home-content">
                @include('includes.sidebar')
            </div>

            <div class="col-md-10">
                <div class="home-content mt-3">
                    <br>
                    <h2 class="text-center mb-4">Peringkat Rekomendasi Jurusan</h2>

                    <div class="col-md-6">
                        <form action="{{ route('rekom.index') }}" method="GET" class="d-flex align-items-center">
                            <input type="text" name="search" class="form-control me-2"
                                placeholder="Cari siswa (nama/NISN)" value="{{ request('search') }}" />
                            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        </form>
                    </div>

                    @if (isset($student))
                        <br>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Nama Siswa: {{ $student->name }}</h4>
                                <p>NISN: {{ $student->nisn }}</p>
                                <p>Kelas: {{ $student->class }}</p>
                            </div>
                        </div>

                        @php
                            $subjects = [
                                'Matematika' => ['mat_tl_smt1', 'mat_tl_smt2', 'mat_tl_smt3', 'mat_tl_smt4'],
                                'Fisika' => ['fis_smt1', 'fis_smt2', 'fis_smt3', 'fis_smt4'],
                                'Kimia' => ['kim_smt1', 'kim_smt2', 'kim_smt3', 'kim_smt4'],
                                'Biologi' => ['bio_smt1', 'bio_smt2', 'bio_smt3', 'bio_smt4'],
                                'Kedokteran' => ['bio_smt1', 'bio_smt2', 'bio_smt3', 'bio_smt4'],
                                'Farmasi' => [
                                    'bio_smt1',
                                    'bio_smt2',
                                    'bio_smt3',
                                    'bio_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                ],
                                'Peternakan' => ['bio_smt1', 'bio_smt2', 'bio_smt3', 'bio_smt4'],
                                'Pertanian' => ['bio_smt1', 'bio_smt2', 'bio_smt3', 'bio_smt4'],
                                'Teknik Sipil' => [
                                    'mat_tl_smt1',
                                    'mat_tl_smt2',
                                    'mat_tl_smt3',
                                    'mat_tl_smt4',
                                    'fis_smt1',
                                    'fis_smt2',
                                    'fis_smt3',
                                    'fis_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                ],
                                'Teknik Mesin' => [
                                    'mat_tl_smt1',
                                    'mat_tl_smt2',
                                    'mat_tl_smt3',
                                    'mat_tl_smt4',
                                    'fis_smt1',
                                    'fis_smt2',
                                    'fis_smt3',
                                    'fis_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                ],
                                'Teknik Informatika' => ['mat_tl_smt1', 'mat_tl_smt2', 'mat_tl_smt3', 'mat_tl_smt4'],
                                'Teknik Elektro' => [
                                    'mat_tl_smt1',
                                    'mat_tl_smt2',
                                    'mat_tl_smt3',
                                    'mat_tl_smt4',
                                    'fis_smt1',
                                    'fis_smt2',
                                    'fis_smt3',
                                    'fis_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                ],
                                'Teknik Industri' => [
                                    'mat_tl_smt1',
                                    'mat_tl_smt2',
                                    'mat_tl_smt3',
                                    'mat_tl_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                    'fis_smt1',
                                    'fis_smt2',
                                    'fis_smt3',
                                    'fis_smt4',
                                ],
                                'Teknik Perminyakan' => [
                                    'mat_tl_smt1',
                                    'mat_tl_smt2',
                                    'mat_tl_smt3',
                                    'mat_tl_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                    'fis_smt1',
                                    'fis_smt2',
                                    'fis_smt3',
                                    'fis_smt4',
                                ],
                                'Teknik Pertambahangan' => [
                                    'mat_tl_smt1',
                                    'mat_tl_smt2',
                                    'mat_tl_smt3',
                                    'mat_tl_smt4',
                                    'kim_smt1',
                                    'kim_smt2',
                                    'kim_smt3',
                                    'kim_smt4',
                                    'fis_smt1',
                                    'fis_smt2',
                                    'fis_smt3',
                                    'fis_smt4',
                                ],
                                //IPS
                                'Ilmu Hukum' => [
                                    'sosio_smt1',
                                    'sosio_smt2',
                                    'sosio_smt3',
                                    'sosio_smt4',
                                    'ppkn_smt1',
                                    'ppkn_smt2',
                                    'ppkn_smt3',
                                    'ppkn_smt4',
                                    'ppkn_smt5',
                                ],
                                'Ekonomi' => [
                                    'eko_smt1',
                                    'eko_smt2',
                                    'eko_smt3',
                                    'eko_smt4',
                                    'mat_smt1',
                                    'mat_smt2',
                                    'mat_smt3',
                                    'mat_smt4',
                                ],
                                'Psikologi' => [
                                    'sosio_smt1',
                                    'sosio_smt2',
                                    'sosio_smt3',
                                    'sosio_smt4',
                                    'mat_smt1',
                                    'mat_smt2',
                                    'mat_smt3',
                                    'mat_smt4',
                                ],
                                'Akuntansi' => ['eko_smt1', 'eko_smt2', 'eko_smt3', 'eko_smt4'],
                                'Manajemen' => ['eko_smt1', 'eko_smt2', 'eko_smt3', 'eko_smt4'],
                                'Hubungan International' => [
                                    'big_smt1',
                                    'big_smt2',
                                    'big_smt3',
                                    'big_smt4',
                                    'sosio_smt1',
                                    'sosio_smt2',
                                    'sosio_smt3',
                                    'sosio_smt4',
                                    'ppkn_smt1',
                                    'ppkn_smt2',
                                    'ppkn_smt3',
                                    'ppkn_smt4',
                                ],
                                'Administrasi Negara' => ['eko_smt1', 'eko_smt2', 'eko_smt3', 'eko_smt4'],
                                'Ilmu Komunikasi' => ['sosio_smt1', 'sosio_smt2', 'sosio_smt3', 'sosio_smt4'],
                                'Bahasa dan Sastra Indonesia' => ['bin_smt1', 'bin_smt2', 'bin_smt3', 'bin_smt4'],
                                'Sastra Inggris' => ['big_smt1', 'big_smt2', 'big_smt3', 'big_smt4'],
                            ];

                            $subjects_bakat = [
                                'Matematika' => ['logis_matematis', 'visual_spasial'],
                                'Fisika' => ['logis_matematis', 'visual_spasial'],
                                'Kimia' => ['logis_matematis', 'visual_spasial', 'naturalis'],
                                'Biologi' => ['logis_matematis', 'naturalis'],
                                'Kedokteran' => ['logis_matematis', 'linguistik', 'interpersonal'],
                                'Farmasi' => ['logis_matematis', 'linguistik', 'naturalis'],
                                'Peternakan' => ['naturalis', 'kinestetik'],
                                'Pertanian' => ['logis_matematis', 'naturalis'],
                                'Teknik Sipil' => ['logis_matematis', 'visual_spasial'],
                                'Teknik Mesin' => ['logis_matematis', 'visual_spasial', 'kinestetik'],
                                'Teknik Informatika' => ['logis_matematis', 'linguistik', 'interpersonal'],
                                'Teknik Elektro' => ['logis_matematis', 'visual_spasial', 'kinestetik'],
                                'Teknik Industri' => ['logis_matematis', 'linguistik', 'kinestetik'],
                                'Teknik Perminyakan' => ['logis_matematis', 'visual_spasial', 'naturalis'],
                                'Teknik Pertambahangan' => ['logis_matematis', 'visual_spasial', 'kinestetik'],
                                //IPS
                                'Ilmu Hukum' => ['logis_matematis', 'linguistik', 'interpersonal'],
                                'Ekonomi' => ['logis_matematis', 'interpersonal'],
                                'Psikologi' => ['intrapersonal', 'interpersonal'],
                                'Akuntansi' => ['logis_matematis', 'intrapersonal', 'interpersonal'],
                                'Manajemen' => ['intrapersonal', 'interpersonal'],
                                'Hubungan International' => ['linguistik', 'interpersonal'],
                                'Administrasi Negara' => ['logis_matematis', 'linguistik', 'interpersonal'],
                                'Ilmu Komunikasi' => ['linguistik', 'interpersonal'],
                                'Bahasa dan Sastra Indonesia' => ['linguistik'],
                                'Sastra Inggris' => ['linguistik'],
                            ];
                            $subjects_minat = [
                                'Matematika' => ['investigatif', 'artistik', 'konvensional'],
                                'Fisika' => ['investigatif', 'artistik', 'realistik'],
                                'Kimia' => ['investigatif', 'realistik', 'konvensional'],
                                'Biologi' => ['investigatif', 'realistik', 'enterprising'],
                                'Kedokteran' => ['investigatif', 'sosial', 'konvensional'],
                                'Farmasi' => ['investigatif', 'sosial', 'konvensional'],
                                'Peternakan' => ['investigatif', 'artistik', 'enterprising'],
                                'Pertanian' => ['investigatif', 'realistik', 'konvensional'],
                                'Teknik Sipil' => ['investigatif', 'realistik', 'konvensional'],
                                'Teknik Mesin' => ['investigatif', 'realistik', 'konvensional'],
                                'Teknik Informatika' => ['investigatif', 'realistik', 'enterprising', 'konvensional'],
                                'Teknik Elektro' => ['investigatif', 'realistik', 'enterprising', 'konvensional'],
                                'Teknik Industri' => ['realistik', 'enterprising', 'konvensional'],
                                'Teknik Perminyakan' => ['investigatif', 'realistik', 'konvensional'],
                                'Teknik Pertambahangan' => ['investigatif', 'realistik', 'enterprising'],
                                //IPS
                                'Ilmu Hukum' => ['investigatif', 'artistik', 'enterprising'],
                                'Ekonomi' => ['investigatif', 'konvensional', 'enterprising'],
                                'Psikologi' => ['investigatif', 'artistik', 'sosial'],
                                'Akuntansi' => ['investigatif', 'konvensional', 'enterprising'],
                                'Manajemen' => ['investigatif', 'konvensional', 'enterprising'],
                                'Hubungan International' => ['investigatif', 'konvensional', 'enterprising', 'sosial'],
                                'Administrasi Negara' => ['investigatif', 'konvensional', 'enterprising', 'sosial'],
                                'Ilmu Komunikasi' => ['konvensional', 'enterprising', 'sosial'],
                                'Bahasa dan Sastra Indonesia' => ['konvensional', 'artistik', 'sosial'],
                                'Sastra Inggris' => ['konvensional', 'artistik', 'sosial'],
                            ];

                            $academic = $academic ?? null;
                            $minat = $minat ?? null;
                            $bakat = $bakat ?? null;
                            $rankingAll = collect();

                            foreach ($academicPrograms as $program) {
                                $relevantSubjects = $subjects[$program->program_studi] ?? [];
                                $relevantSubjects_bakat = $subjects_bakat[$program->program_studi] ?? [];
                                $relevantSubjects_minat = $subjects_minat[$program->program_studi] ?? [];

                                $subjectAverages = collect($relevantSubjects)
                                    ->groupBy(fn($field) => Str::beforeLast($field, '_smt'))
                                    ->map(function ($fields) use ($academic) {
                                        return collect($fields)
                                            ->map(fn($field) => $academic?->$field)
                                            ->filter(fn($val) => is_numeric($val) && $val > 0)
                                            ->avg() ?? 0;
                                    });

                                $grades_bakat = collect($relevantSubjects_bakat)
                                    ->map(fn($col) => $bakat?->$col)
                                    ->filter(fn($val) => $val !== null);

                                $grades_minat = collect($relevantSubjects_minat)
                                    ->map(fn($col) => $minat?->$col)
                                    ->filter(fn($val) => $val !== null);

                                $avgAkademik = $subjectAverages->avg() ?? 0;
                                $avgBakat = $grades_bakat->avg() ?? 0;
                                $avgMinat = $grades_minat->avg() ?? 0;

                                $rankingAll->push([
                                    'program_studi' => $program->program_studi,
                                    'mata_pelajaran_pendukung' => $program->mata_pelajaran_pendukung,
                                    'averageAcademic' => $avgAkademik,
                                    'averageBakat' => $avgBakat,
                                    'averageMinat' => $avgMinat,
                                    'averageTalent' => $program->bakat ?? '-',
                                    'averageInterest' => $program->minat ?? '-',
                                ]);
                            }

                            function normalize($value, $min, $max)
                            {
                                return $max != $min ? ($value - $min) / ($max - $min) : 1;
                            }

                            $minAkademik = $rankingAll->min('averageAcademic');
                            $maxAkademik = $rankingAll->max('averageAcademic');
                            $minBakat = $rankingAll->min('averageBakat');
                            $maxBakat = $rankingAll->max('averageBakat');
                            $minMinat = $rankingAll->min('averageMinat');
                            $maxMinat = $rankingAll->max('averageMinat');

                            $rankedAll = $rankingAll
                                ->map(function ($item) use (
                                    $minAkademik,
                                    $maxAkademik,
                                    $minBakat,
                                    $maxBakat,
                                    $minMinat,
                                    $maxMinat,
                                ) {
                                    $normalizedAcademic = normalize(
                                        $item['averageAcademic'],
                                        $minAkademik,
                                        $maxAkademik,
                                    );
                                    $normalizedBakat = normalize($item['averageBakat'], $minBakat, $maxBakat);
                                    $normalizedMinat = normalize($item['averageMinat'], $minMinat, $maxMinat);

                                    $NaAcademic = $normalizedAcademic * 0.5;
                                    $NaBakat = $normalizedBakat * 0.25;
                                    $NaMinat = $normalizedMinat * 0.25;
                                    $TotalNA = $NaAcademic + $NaBakat + $NaMinat;

                                    return array_merge($item, [
                                        'normalizedAcademic' => $normalizedAcademic,
                                        'normalizedBakat' => $normalizedBakat,
                                        'normalizedMinat' => $normalizedMinat,
                                        'NaAcademic' => $NaAcademic,
                                        'NaBakat' => $NaBakat,
                                        'NaMinat' => $NaMinat,
                                        'TotalNA' => $TotalNA,
                                    ]);
                                })
                                ->sortByDesc('TotalNA')
                                ->values();
                        @endphp

                        <h4>Hasil Rekomendasi Program Studi (IPA dan IPS)</h4>
                        @include('partials.ranking-table', ['rankedPrograms' => $rankedAll])
                    @else
                        <p class="text-center">Cari siswa terlebih dahulu.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
