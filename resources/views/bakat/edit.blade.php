@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div>
            @include('includes.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <h2>Edit Data Bakat</h2>
            <form action="{{ route('bakat.update', $bakat->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="student_id">Pilih Siswa</label>
                    <select name="student_id" class="form-control" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" @if($student->id == $bakat->student_id) selected @endif>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="linguistik" class="form-label">Linguistik</label>
                        <input type="number" id="linguistik" name="linguistik" class="form-control" value="{{ old('linguistik', $bakat->linguistik) }}" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label for="logis_matematis" class="form-label">Logis Matematis</label>
                        <input type="number" id="logis_matematis" name="logis_matematis" class="form-control" value="{{ old('logis_matematis', $bakat->logis_matematis) }}" min="0" max="100">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="visual_spasial" class="form-label">Visual Spasial</label>
                        <input type="number" id="visual_spasial" name="visual_spasial" class="form-control" value="{{ old('visual_spasial', $bakat->visual_spasial) }}" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label for="musikal" class="form-label">Musikal</label>
                        <input type="number" id="musikal" name="musikal" class="form-control" value="{{ old('musikal', $bakat->musikal) }}" min="0" max="100">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kinestetik" class="form-label">Kinestetik</label>
                        <input type="number" id="kinestetik" name="kinestetik" class="form-control" value="{{ old('kinestetik', $bakat->kinestetik) }}" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label for="interpersonal" class="form-label">Interpersonal</label>
                        <input type="number" id="interpersonal" name="interpersonal" class="form-control" value="{{ old('interpersonal', $bakat->interpersonal) }}" min="0" max="100">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="intrapersonal" class="form-label">Intrapersonal</label>
                        <input type="number" id="intrapersonal" name="intrapersonal" class="form-control" value="{{ old('intrapersonal', $bakat->intrapersonal) }}" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label for="naturalis" class="form-label">Naturalis</label>
                        <input type="number" id="naturalis" name="naturalis" class="form-control" value="{{ old('naturalis', $bakat->naturalis) }}" min="0" max="100">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
            </form>
        </div>
    </div>
</div>
@endsection
