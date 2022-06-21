@php($forms=['NPM','Nama Lengkap','Jurusan','Alamat','email','Angkatan','Kelas','Jenis Kelamin','Aksi'])
@php($tambah=1)
@php($ubah=1)
@php($hapus=1)
@php($cek=1)
@php($validasi=1)
@section('header','Kelola Data Mahasiswa')
{{-- @php($import=1) --}}
@php($alamat="/staff/kelola_mahasiswa")
@php($input=[
            'nama'=>[
            'NPM',
            'Nama Lengkap',
            'Alamat',
            'email',
            'Angkatan',
            ],

            'type'=>[
            'number',
            'text',
            'text',
            'email',
            'number',
            ],

            'name'=>[
            'npm',
            'nama',
            'alamat',
            'email',
            'angkatan',
            ],

            'value'=>[
            '',
            '',
            '',
            '',
            '',
            ],

            'placeholder'=>[
            '',
            '',
            '',
            '',
            '',
            ]
        ]
)
@php($select=[
            'nama'=>['Kelas','Jurusan','Jenis Kelamin'],

            'name'=>['kelas','jurusan', 'jenisKelamin'],

            'value'=>[
                'kelas'=>['IF A' , 'IF B','IF C', 'Sipil A','Sipil B','TI A','TI B'],
                'jurusan'=>['IF','SIPIL','INDUSTRI'],
                'jenisKelamin'=>['Laki-Laki','Perempuan'],
                ]

        ])
@extends('layouts.app')
{{-- @section('content_header','Kelola Data Mahasiswa') --}}
@section('title','Kelola Mahasiswa')
@section('script')
    alamat="/staff/kelola_mahasiswa";
    form=[  'npm',
            'nama',
            'alamat',
            'email',
            'angkatan',
            'kelas',
            'jurusan',
            'jenisKelamin'];
    tambah();
    ubah();
    hapus();
    {{-- lulus(); --}}
    data = [{data: 'npm'},
            {data: 'nama'},
            {data: 'jurusan'},
            {data: 'alamat'},
            {data: 'users.email', name: 'users.email'},
            {data: 'angkatan'},
            {data: 'kelas'},
            {data: 'jenisKelamin'},
            {
                data: 'Aksi',
                name: 'Aksi',
                orderable: true,
                searchable: true
            }];
    tampilTabel();
@endsection
