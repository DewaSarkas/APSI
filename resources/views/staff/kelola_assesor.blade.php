@extends('layouts.app');
@php($forms=['No','Nama','Email','Aksi'])
@php($tambah=1)
@php($ubah=1)
@php($hapus=1)
@section('header','Kelola Data Assesor')
@php($alamat="/staff/kelola_assesor")
@section('title','Kelola Data Assesor')
@php($input=[
            'nama'=>[
            'Nama',
            'Email'
            ],

            'type'=>[
            'text',
            'email'
            ],

            'name'=>[
            'nama',
            'email'
            ],

            'value'=>[
            '',
            ''
            ],

            'placeholder'=>[
            '',
            ''
            ]
        ]
)
@section('script')
    alamat="/staff/kelola_assesor";
    form=['nama','email'];
    tambah();
    ubah();
    hapus();
    data = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'nama'},
            {data: 'users.email'},
            {
                data: 'Aksi',
                name: 'Aksi',
                orderable: true,
                searchable: true
            }];
    tampilTabel();
@endsection
