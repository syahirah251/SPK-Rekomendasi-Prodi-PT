@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div>
            @include('includes.sidebar')
        </div>

        <!-- Konten Utama -->
        <div class="col-md-10">
            <div class="home-content mt-3">
                <h1 class="text-center">Edit Siswa</h1>

                <!-- Form Edit Siswa -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('students.update', $student->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn', $student->nisn) }}" placeholder="Masukkan NISN">
                                @error('nisn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}" placeholder="Masukkan Nama Siswa">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}" placeholder="Masukkan Email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="class">Kelas</label>
                                <input type="text" name="class" id="class" class="form-control @error('class') is-invalid @enderror" value="{{ old('class', $student->class) }}" placeholder="Masukkan Kelas">
                                @error('class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
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
