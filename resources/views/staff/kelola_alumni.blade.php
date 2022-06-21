@php($forms = ['NPM', 'Nama Lengkap', 'Jurusan', 'Alamat', 'email', 'Angkatan', 'Lulusan', 'Kelas', 'JenisKelamin', 'Aksi'])
@php($ubah = 1)
@php($hapus = 1)
@section('header', 'Kelola Data Alumni')
@section('title', 'Kelola Data Alumni')
@php($alamat = '/staff/kelola_alumni')
@php(
    $input = [
        'nama' => ['NPM', 'Nama Lengkap', 'Alamat', 'email', 'Angkatan', 'Lulusan'],

        'type' => ['number', 'text', 'text', 'email', 'number', 'number'],

        'name' => ['npm', 'nama', 'alamat', 'email', 'angkatan', 'lulusan'],

        'value' => ['', '', '', '', '', ''],

        'placeholder' => ['', '', '', '', '', ''],
    ]
)
@php(
    $select = [
        'nama' => ['Kelas', 'Jurusan', 'Jenis Kelamin'],

        'name' => ['kelas', 'jurusan', 'jenisKelamin'],

        'value' => [
            'kelas' => ['IF A', 'IF B', 'Sipil A', 'Sipil B', 'TI A', 'TI B'],
            'jurusan' => ['IF', 'SIPIL', 'INDUSTRI'],
            'jenisKelamin' => ['Laki-Laki', 'Perempuan'],
        ],
    ]
)

<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="url_ubah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-3">NPM</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="number" value="" placeholder="" name=""
                                class="form-control npmubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Nama Lengkap</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control namaubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Alamat</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control alamatubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">email</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name="email"
                                class="form-control emailubah"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Angkatan</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control angkatanubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Lulusan</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control lulusanubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Kelas</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control kelasubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Jurusan</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control jurusanubah" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">Jenis Kelamin</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><input type="text" value="" placeholder="" name=""
                                class="form-control jenisKelaminubah" readonly></div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>


@extends('layouts.app')
@section('script')
    alamat="/staff/kelola_alumni";
    form=[  'npm',
            'nama',
            'email',
            'alamat',
            'angkatan',
            'lulusan',
            'kelas',
            'jurusan',
            'jenisKelamin',];
    tambah();
    ubah();
    hapus();
    data = [{data: 'npm'},
    {data: 'nama'},
    {data: 'jurusan'},
    {data: 'alamat'},
    {data: 'users.email'},
    {data: 'angkatan'},
    {data: 'lulusan'},
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
