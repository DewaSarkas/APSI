@php($forms=['No','NIDN','Nama Lengkap','Email','Alamat','Aksi'])
@php($tambah=1)
@php($ubah=1)
@php($hapus=1)
@section('header','Kelola Data Dosen')
@section('title','Kelola Data Dosen')
@php($alamat="/staff/kelola_dosen")
@php($input=[
            'nama'=>[
            'NIDN',
            'Nama Lengkap',
            'Email',
            'Alamat',
            ],

            'type'=>[
            'number',
            'text',
            'email',
            'text',
            ],

            'name'=>[
            'nidn',
            'nama',
            'email',
            'alamat',
            ],

            'value'=>[
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
            ]
        ]
)
@extends('layouts.app')
@section('script')
    alamat="/staff/kelola_dosen";
    form=[  'nidn',
            'nama',
            'email',
            'alamat'];
    tambah();
    ubah();
    hapus();
    data = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'nidn'},
            {data: 'nama'},
            {data: 'users.email'},
            {data: 'alamat'},
            {
                data: 'Aksi',
                name: 'Aksi',
                orderable: true,
                searchable: true
            }];
    tampilTabel();
@endsection
