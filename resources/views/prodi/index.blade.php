@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div>
            @include('includes.sidebar') <!-- Sidebar tetap -->
        </div>

        <!-- Konten Utama -->
        <div class="col-md-10">
            <div class="home-content mt-3">
            <h1 class="text-center mb-4">Daftar Program Akademik</h1>

            <!-- Tabel Data Program Akademik -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th style="width: 10%;">No</th>
                            <th style="width: 15%;">Program Studi</th>
                            <th style="width: 15%;">Mata Pelajaran Pendukung</th>
                            <th style="width: 35%;">Bakat</th>
                            <th style="width: 35%;">Minat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programs as $key => $program)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $program->program_studi }}</td>
                                <td>{{ $program->mata_pelajaran_pendukung }}</td>
                                <td class="text-center">{{ $program->bakat }}</td>
                                <td class="text-center">{{ $program->minat }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
