@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Alat</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alat as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->nama_alat }}</td>
                    <td>{{ $a->kategori->nama_kategori }}</td>
                    <td>{{ $a->jumlah }}</td>
                    <td>{{ $a->kondisi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection