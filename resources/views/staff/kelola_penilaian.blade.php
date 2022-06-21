@php($forms=['No','Tahun Periksa','Aksi'])
@php($hapus=1)
@section('header','Kelola Data Penilaian')
@section('title','Kelola Data Penilaian')
@php($alamat="/staff/kelola_penilaian")

@extends('layouts.app')
@section('script')
    alamat="/staff/kelola_penilaian";
    tambah();
    ubah();
    hapus();
    data = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }
            ,{data: 'year'},
            {
                data: 'Aksi',
                name: 'Aksi',
                orderable: true,
                searchable: true
            }];
    tampilTabel();
@endsection
