<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Nilai</title>
</head>
<body>
    <h1 class="text-center">Hasil Penilaian Dokumen</h1>
    <br>
        <table id="table-data" class="table table-striped table-bordered" style="width:100%">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>Nama Dokumen</th>
                <th>Kategori</th>
                <th>Sub-Kategori</th>
                <th>Nama Pemeriksa</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody align="center">
            @php $no=1; @endphp
            @foreach($data as $dt)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$dt->dokumen->namaDokumen}}</td>
                <td>{{$dt->dokumen->sub_kategori->kategori->nama}}</td>
                <td>{{$dt->dokumen->sub_kategori->nama}}</td>
                <td>{{$dt->penilai}}</td>
                <td>{{$dt->nilai->keterangan}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5">Rata-rata</td>
                <td>{{$rata}}</td>
            </tr>
        </tbody>
        </table>
</body>
</html>
