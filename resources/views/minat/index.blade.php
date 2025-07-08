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
            <h2 class="text-center mt-3 mb-4">Nilai Minat Siswa</h2>
            
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
                            <form action="{{ route('minat.index') }}" method="GET" class="d-flex align-items-center ">
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
                            <form action="{{ route('minat.store') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
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
                    <a href="{{ asset('templates/NILAI_MINAT.xlsx') }}" class=" d-flex align-items-center  btn btn-info">
                        Download Template Minat Excel
                    </a>
                </div>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>NISN</th>
                        <th>Siswa</th>
                        <th>Realistik</th>
                        <th>Investigatif</th>
                        <th>Artistik</th>
                        <th>Sosial</th>
                        <th>Enterprising</th>
                        <th>konvensional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>							
                <tbody>
                    @foreach($minats as $minat)
                    <tr>
                        <td>{{ $minat->student->nisn ?? '-' }}</td>
                        <td>{{ $minat->student->name ?? '-' }}</td>
                        <td>{{ $minat->realistik }}</td>
                        <td>{{ $minat->investigatif }}</td>
                        <td>{{ $minat->artistik }}</td>
                        <td>{{ $minat->sosial }}</td>
                        <td>{{ $minat->enterprising }}</td>
                        <td>{{ $minat->konvensional }}</td>
                        <td>
                            <a href="{{ route('minat.edit', $minat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('minat.destroy', $minat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
