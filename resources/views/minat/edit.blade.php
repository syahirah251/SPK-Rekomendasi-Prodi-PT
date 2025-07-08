@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div>
            @include('includes.sidebar')
        </div>
        <div class="col-md-10">
            <h1 class="text-center mt-4">Edit Nilai Minat Siswa</h1>

            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <!-- Form Edit -->
                    <form method="POST" action="{{ route('minat.update', $minat->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- NISN dan Nama -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" id="nisn" class="form-control" value="{{ $minat->student->nisn }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Siswa</label>
                                <input type="text" id="name" class="form-control" value="{{ $minat->student->name }}" readonly>
                            </div>
                        </div>

                        <!-- Form Input Nilai Minat -->
                       
                        <div class="form-group">
                            <label for="realistik">Nilai Realistik</label>
                            <input type="number" name="realistik" class="form-control" value="{{ old('realistik', $minat->realistik) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="investigatif">Nilai Investigatif</label>
                            <input type="number" name="investigatif" class="form-control" value="{{ old('investigatif', $minat->investigatif) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="artistik">Nilai Artistik</label>
                            <input type="number" name="artistik" class="form-control" value="{{ old('artistik', $minat->artistik) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="sosial">Nilai Sosial</label>
                            <input type="number" name="sosial" class="form-control" value="{{ old('sosial', $minat->sosial) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="enterprising">Nilai Enterprising</label>
                            <input type="number" name="enterprising" class="form-control" value="{{ old('enterprising', $minat->enterprising) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="konvensional">Nilai Konvensional</label>
                            <input type="number" name="konvensional" class="form-control" value="{{ old('konvensional', $minat->konvensional) }}">
                        </div>
                        <!-- Tombol Submit -->
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                <a href="{{ route('minat.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
