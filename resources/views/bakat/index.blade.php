@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div>
            @include('includes.sidebar')  <!-- Menambahkan sidebar yang sama dengan view minat -->
        </div>
        
        <!-- Main Content -->
        <div class="col-md-10">
            <h2 class="text-center mt-3 mb-4">Data Bakat</h2>
            
            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form Pencarian -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Form Pencarian -->
                        <div class="col-md-6">
                            <form action="{{ route('bakat.index') }}" method="GET" class="d-flex align-items-center ">
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
                            <form action="{{ route('bakat.store') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
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
                    <a href="{{ asset('templates/NILAI_BAKAT.xlsx') }}" class=" d-flex align-items-center  btn btn-info">
                        Download Template Bakat Excel
                    </a>
                </div>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>NISN</th>
                        <th>Siswa</th>
                        <th>linguistik</th>
                        <th>Logi Matematis</th>
                        <th>Visual Spasial</th>
                        <th>Musikal</th>
                        <th>Kinestetik</th>
                        <th>Interpersonal</th>
                        <th>Intrapersonal</th>
                        <th>Naturalis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bakats as $bakat)
                    <tr>
                        <td>{{ $bakat->student->nisn  }}</td>
                        <td>{{ $bakat->student->name }}</td>
                        <td>{{ $bakat->linguistik ?? '-' }}</td>
                        <td>{{ $bakat->logis_matematis ?? '-' }}</td>
                        <td>{{ $bakat->visual_spasial ?? '-' }}</td>
                        <td>{{ $bakat->musikal ?? '-' }}</td>
                        <td>{{ $bakat->kinestetik ?? '-' }}</td>
                        <td>{{ $bakat->interpersonal ?? '-' }}</td>
                        <td>{{ $bakat->intrapersonal ?? '-' }}</td>
                        <td>{{ $bakat->naturalis ?? '-' }}</td>
                        <td>
                            <a href="{{ route('bakat.edit', $bakat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('bakat.destroy', $bakat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
@endsection
