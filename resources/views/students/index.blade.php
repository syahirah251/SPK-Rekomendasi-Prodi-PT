@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="home-content">
            @include('includes.sidebar')
        </div>

        <!-- Konten Utama -->
        <div class="col-md-10">
            <div class="home-content mt-3">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <!-- Form Pencarian -->
                            <div class="col-md-6">
                                <form action="{{ route('students.index') }}" method="GET" class="d-flex align-items-center ">
                                    <input 
                                        type="text" 
                                        name="search" 
                                        class="form-control me-6" 
                                        placeholder="Cari siswa (nama/NISN)" 
                                        value="{{ request('search') }}" 
                                    />
                                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                </form>
                            </div>
                
                            <!-- Form Upload File Excel -->
                            <div class="col-md-6">
                                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                                    @csrf
                                    <input 
                                        type="file" 
                                        name="file" 
                                        class="form-control" 
                                        accept=".xlsx,.xls,.csv"
                                        required
                                    />
                                    <button type="submit" class="btn btn-success btn-sm">Upload</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <a href="{{ asset('templates/NamaSiswa.xlsx') }}" class=" d-flex align-items-center  btn btn-info">
                            Download Template Siswa/Siswi Excel
                        </a>
                    </div>
                </div>
                <!-- Tabel Daftar Siswa -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class = 'thead-dark'>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kelas dan Penjurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->nisn }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
