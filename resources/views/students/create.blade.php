@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar (Jika ada) -->
        <div>
            <!-- Sidebar content (misalnya link atau menu) -->
            @include('includes.sidebar')
        </div>

        <!-- Konten Utama -->
        <div class="col-md-10">
            <div class="home-content mt-3">
                <h1 class="text-center">Tambah Siswa</h1>

                <!-- Form Tambah Siswa -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('students.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="Masukkan NISN" value="{{ old('nisn') }}">
                                @error('nisn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Siswa" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="class">Kelas</label>
                                <input type="text" name="class" id="class" class="form-control @error('class') is-invalid @enderror" placeholder="Masukkan Kelas" value="{{ old('class') }}">
                                @error('class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
