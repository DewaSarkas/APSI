@extends('layouts.app')
@php($forms=['No','Nama Dokumen','Kategori','Sub Kategori','Status','Aksi'])
@php($hapus=1)
@section('header','Kelola Data Dokumen Akreditasi')
@section('bd')
<button class="btn tambah">
    Tambah
</button>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ 'kelola_dokumen/tambah' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-3">Nama Dokumen</div>
                    <div class="col-1">:</div>
                    <div class="col-7"><input type="text" name="namaDokumen" value="" placeholder=""
                            class="form-control"></div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">Kategori</div>
                    <div class="col-1">:</div>
                    <div class="col-7">
                        <select name="kategori" class="form-control" id="inputKategori">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" id="kat" data-id="{{$item->id}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">Sub Kategori</div>
                    <div class="col-1">:</div>
                    <div class="col-7">
                        <select name="subkategori" class="form-control" id="sub">

                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">Keterangan</div>
                    <div class="col-1">:</div>
                    <div class="col-7">
                        <p id="keterangan"></p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">Pilih Dokumen</div>
                    <div class="col-1">:</div>
                    <div class="col-7"><input type="file" name="berkas" value="" placeholder=""
                            class="form-control"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3"></div>
                    <div class="col-1"></div>
                    <div class="col-7"><p style="color: red">dokumen harus berekstensi .pdf</p></div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
    </div>
</div>
</div>

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
                <div class="col-3">Nama Dokumen</div>
                <div class="col-1">:</div>
                <div class="col-7"><input type="text" name="namaDokumen"value=""
                        class="form-control namaDokumenubah"></div>
            </div>

            <div class="row mb-2">
                <div class="col-3">Kategori</div>
                <div class="col-1">:</div>
                <div class="col-7">
                    <select name="kategori" class="form-control namaKategoriubah" id="inputKategoriUbah">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" id="kat" data-id="{{$item->id}}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-3">Sub Kategori</div>
                <div class="col-1">:</div>
                <div class="col-7">
                    <select name="subkategori" class="form-control namaSubKategoriubah" id="subUbah">

                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-3">Keterangan</div>
                <div class="col-1">:</div>
                <div class="col-7">
                    <p id="keteranganUbah" class="keteranganubah"></p>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-3">Pilih Dokumen</div>
                <div class="col-1">:</div>
                <div class="col-7"><input type="file" name="berkas" value="" placeholder=""
                        class="form-control"></div>
            </div>
            <div class="row mb-2">
                <div class="col-3"></div>
                <div class="col-1"></div>
                <div class="col-7"><p style="color: red">dokumen harus berekstensi .pdf</p></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Kirim</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('title', 'Kelola Data Dokumen')
@section('script')
    tambah();
    document.getElementById("inputKategori").onclick = function(){
        var id = $('option:selected',this).data("id");
        $.ajax({
            url: 'kelola_dokumen/kat/'+id,
            success: function(result){
                $.each(result, function(result, value) {
                    $('#sub')
                        .append($("<option></option>")
                                   .attr("value", value.id)
                                   .text(value.nama));
                    $('#inputKategori').on('click', function() {
                        $("#sub option[value='"+value.id+"']").remove();
                                  });

               $('#sub').on('click', function() {
                var id = $(this).children("option:selected").val();
                if(value.id == id){
                $('#keterangan').text(value.keterangan)
                }
                        });

               });
          }
        });
    };

    document.getElementById("inputKategoriUbah").onclick = function(){
        console.log("OK");
        var id = $('option:selected',this).data("id");
        $.ajax({
            url: 'kelola_dokumen/kat/'+id,
            success: function(result){
                $.each(result, function(result, value) {
                    $('#subUbah')
                        .append($("<option></option>")
                                   .attr("value", value.id)
                                   .text(value.nama));
                    $('#inputKategoriUbah').on('click', function() {
                        $("#subUbah option[value='"+value.id+"']").remove();
                                  });

               $('#subUbah').on('click', function() {
                var id = $(this).children("option:selected").val();
                if(value.id == id){
                $('#keteranganUbah').text(value.keterangan)
                }
                        });

               });
          }
        });
    };

    alamat="/staff/kelola_dokumen";
    form=[ 'namaDokumen',
            'namaKategori',
            'namaSubKategori',
            'keterangan'
    ];
    data = [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'namaDokumen'},
            {data: 'sub_kategori.kategori.nama'},
            {data: 'sub_kategori.nama'},
            {data: 'status'},
            {
                data: 'Aksi',
                name: 'Aksi',
                orderable: true,
                searchable: true
            }];
    tampilTabel();
    hapus();
    ubah();
@endsection
