<!-- resources/views/partials/ranking-table.blade.php -->

<table class="table table-bordered table-striped text-center">
    <thead class="thead-dark">
        <tr>
            <th>NO</th>
            <th>Program Studi</th>
            <th>Mata Pelajaran Pendukung</th>
            <th>Bakat</th>
            <th>Minat</th>
            <th>Rata-Rata Akademik</th>
            <th>Rata-Rata Minat</th>
            <th>Rata-Rata Bakat</th>
            <th>Normalisasi Akademik</th>
            <th>Normalisasi Bakat</th>
            <th>Normalisasi Minat</th>
            <th>NA Academic</th>
            <th>NA Bakat</th>
            <th>NA Minat</th>
            <th>Total NA</th>
            <th>Rank</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rankedPrograms as $index => $program)
            {{-- @php
                dd($program);
            @endphp --}}
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $program['program_studi'] }}</td>
                <td>{{ $program['mata_pelajaran_pendukung'] }}</td>
                <td>{{ $program['averageTalent'] }}</td>
                <td>{{ $program['averageInterest'] }}</td>
                <td>{{ number_format($program['averageAcademic'], 2) }}</td>
                <td>{{ number_format($program['averageBakat'], 2) }}</td>
                <td>{{ number_format($program['averageMinat'], 2) }}</td>
                <td>{{ number_format($program['normalizedAcademic'], 4) }}</td>
                <td>{{ number_format($program['normalizedBakat'], 4) }}</td>
                <td>{{ number_format($program['normalizedMinat'], 4) }}</td>
                <td>{{ number_format($program['NaAcademic'], 4) }}</td>
                <td>{{ number_format($program['NaBakat'], 4) }}</td>
                <td>{{ number_format($program['NaMinat'], 4) }}</td>
                <td>{{ number_format($program['TotalNA'], 4) }}</td>
                <td>{{ $index + 1 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
