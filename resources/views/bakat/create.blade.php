@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div>
            @include('includes.sidebar')  <!-- Menambahkan sidebar -->
        </div>
        
        <!-- Main Content -->
        <div class="col-md-10">
            <h2 class="mb-4">Tambah Data Bakat</h2>
            
            <!-- Form Input Bakat -->
            <form action="{{ route('bakat.store') }}"  method="POST" enctype="multipart/form-data"class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="student_id">Pilih Siswa</label>
                    <select name="student_id" class="form-control" required>
                        <option value="" disabled selected>Pilih Siswa</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="file">Pilih File Excel</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx,.xls" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data Bakat</button>
            </form>


        </div>
    </div>
</div>
@endsection
