@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Column -->
            <div>
                @include('includes.sidebar')
            </div>

            <!-- Main Content Column -->
            <div class="col-md-10">
                <div class="container mt-3">
                    <h1>Tambahkan Nilai Minat Siswa</h1>

              
                    @if(session('duplicate'))
                        <div class="alert alert-danger">{{ session('duplicate') }}</div>
                    @endif
                
                    <form action="{{ route('minat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="student_id">Pilih Siswa</label>
                            <select name="student_id" id="student_id" class="form-control" required>
                                <option value="">--Pilih Siswa--</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload Academic Record (Excel/CSV)</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
