@extends('layouts.app')
@section('bd')
@section('title','Penilaian')
<div class="tabbable boxed parentTabs p-4">
    <ul class="nav nav-tabs">
        @foreach ($kategori as $item)
        <li><a href="#a{{$item->id}}" class="nav-link">{{$item->nama}}</a>
        </li>
        @endforeach

    </ul>
    <div class="tab-content">
        @foreach ($kategori as $kat)
        <div class="tab-pane fade" id="a{{$kat->id}}">
            <div class="tabbable">
                <ul class="nav nav-tabs">

                    @foreach ($sub_kategori as $sub)

                    @if ($sub->kategori_id == $kat->id)
                        <li><a href="#b{{$sub->id}}" data-id="{{$sub->id}}" class="nav-link ok">{{$sub->nama}}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <div class="tab-content">
                @foreach ($sub_kategori as $sub)
                @if ($sub->kategori_id == $kat->id)

                    <div class="tab-pane fade in" id="b{{$sub->id}}">
                        <h3 id="ket{{$sub->id}}"></h3>
                        <table class="table" id="tabel{{$sub->id}}">
                            <thead>
                                <th>
                                    Nama Dokumen
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                @endif
                @endforeach
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="nilaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ 'penilaian/nilai' }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-3">Nama Dokumen</div>
                    <div class="col-1">:</div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="nama" name="inputNama" value="" readonly>
                        <input type="hidden" name="id" value="">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">Nilai</div>
                    <div class="col-1">:</div>
                    <div class="col-7">
                        <select name="nilai" class="form-control" id="inputNilai">
                            <option value="1" id="kat" >Sangat Buruk</option>
                            <option value="2" id="kat" >Buruk</option>
                            <option value="3" id="kat" >Cukup</option>
                            <option value="4" id="kat" >Baik</option>
                            <option value="5" id="kat" >Sangat Baik</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">Nilai Sementara</div>
                    <div class="col-1">:</div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="" name="smnt" value="Dokumen belum dinilai" readonly>
                        <input type="hidden" name="id" value="">
                    </div>
                </div>

                <input type="hidden" name="penilai" value="{{ Auth::user()->name }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
    </div>
</div>
</div>

@endsection
@section('script')
tp();
function tp(){
    $('body').on('click','.ok.active',function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/assesor/penilaian/sub/'+id,
        success: function(result){
            var ket = document.getElementById("ket"+id);
            ket.textContent = result[0]['keterangan'];
        }
    })
  });

  $('body').on('click','.ok.active',function(){
    var id = $(this).data('id');
    $("#tabel"+id+" tbody").empty();
    $.ajax({
        url: '/assesor/penilaian/doc/'+id,
        success: function(result){
            $.each(result, function(result, value){
            var markup = "<tr><td> "+value.namaDokumen+ " </td> <td><a class='btn lihat' href=/lihat/"+ value.id+ " target=_blank>Lihat</a> <button class='btn ubah' data-id="+value.id+" id='nilai'>Nilai</button></td></tr>";
            tableBody = $("#tabel"+id+" tbody");
            tableBody.append(markup);
            });
        }
    })
  });

  $('body').on('click','#nilai',function(){
    $('#nilaiModal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: '/assesor/penilaian/dokumen/'+id,
        success: function(result){
            $('input[name="inputNama"]').val(result[0]['namaDokumen']);
            $('input[name="id"]').val(result[0]['id']);
        }
    });
    $('input[name="smnt"]').val('');
        $.ajax({
            url: '/assesor/penilaian/smnt/'+id,
            success: function(result){
                $('input[name="smnt"]').val(result[0].penilaian.nilai.keterangan);
            },
        });

    });
}


@endsection
