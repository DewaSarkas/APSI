@extends('adminlte::page')
@section('content')


<div class="text-center p2">
    <h3 class="mb-2">@yield('header')</h3>
</div>
<div class="container col-md-12 col-xs-12 col-sm-12 wrapper">


    <div class="card" style="margin-top: 10px;">
        <div class="card-body">

        @yield('bd')
        @if(isset($tambah))
        <button class="btn tambah">
            Tambah
        </button>
        @endif
        @if(isset($cetak))
        <a href="{{$alamat}}/cetak" class="btn cetak">
            Cetak </a>
        @endif
        @if (isset($cek))
        <a href="{{$alamat}}/cek" class= "btn cek">
        Cek
        </a>
        @endif
        @if (isset($import))
        <button type="button" class="btn impor" data-toggle="modal" data-target = "#importExcel">
            Impor Excel
        </button>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif


        @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <table class="table">
            @if (isset($forms))

            <thead>
            @foreach ($forms as  $form )

            <th>{{$form}}</th>
                @endforeach
            </thead>

            @endif
        </table>
    </div>
</div>


@if (isset($import))
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{$alamat}}/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Impor Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif


@if(isset($ubah))
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
          @for($a=0;$a<=count($input['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$input['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7"><input type="{{$input['type'][$a]}}" value="{{$input['value'][$a]}}" placeholder="{{$input['placeholder'][$a]}}" name="{{$input['name'][$a]}}" class="form-control {{$input['name'][$a].'ubah'}}"></div>
               </div>
            @endfor
            @if(isset($select))
            @for($a=0;$a<=count($select['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$select['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7">
                <select name="{{$select['name'][$a]}}" class="form-control {{$select['name'][$a].'ubah'}}">
                @for($i=0;$i<=count($select['value'][$select['name'][$a]])-1;$i++)
                     <option value="{{$select['value'][$select['name'][$a]][$i]}}">{{$select['value'][$select['name'][$a]][$i]}}</option>
                @endfor
                </select>

               </div>
                </div>
            @endfor

            @endif
            @if(isset($radio))
            @for($a=0;$a<=count($radio['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$radio['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7">
               @for($i=0;$i<=count($radio['value'][$radio['name'][$a]])-1;$i++)
                   <input type="radio" name="{{$radio['name'][$a]}}" value="{{$radio['value'][$radio['name'][$a]][$i]}}" class="{{$radio['name'][$a].'ubah'}}" {{ $radio['value'][$radio['name'][$a]][$i] == $radio['name'][$a].'ubah' ? 'checked' : ''}}>&nbsp;{{$radio['value'][$radio['name'][$a]][$i]}}&nbsp;
                   @endfor
                </div>
               </div>
            @endfor
          @endif

          @if(isset($chkbox))
            @for($a=0;$a<=count($chkbox['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$chkbox['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7">
               @for($i=0;$i<=count($chkbox['value'][$chkbox['name'][$a]])-1;$i++)
                   <input type="checkbox" name="{{$chkbox['name'][$a]}}"  value="{{$chkbox['value'][$chkbox['name'][$a]][$i]}}"  class="{{$chkbox['name'][$a].'ubah'}}">&nbsp;{{$chkbox['value'][$chkbox['name'][$a]][$i]}}&nbsp;
                   @endfor
                </div>
               </div>
            @endfor
 @endif
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Kirim</button>
      </div>
</form>
    </div>
  </div>
</div>
@endif

@if(isset($detail))
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          @for($a=0;$a<=count($input['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$input['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7"><input type="{{$input['type'][$a]}}" name="{{$input['name'][$a]}}" value="{{$input['value'][$a]}}" class="form-control {{$input['name'][$a].'detail'}}"></div>
               </div>
            @endfor

    </table>
      </div>
    </div>
  </div>
</div>
@endif


@if(isset($hapus))
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Data Akan Dihapus?
      </div>
      <div class="modal-footer">
        <a class="url_hapus"><button class="btn btn-secondary " >Hapus</button></a>
      </div>
    </div>
  </div>
</div>
@endif

@if(isset($tambah))
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="{{$alamat.'/tambah'}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($input))
            @for($a=0;$a<=count($input['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$input['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7"><input type="{{$input['type'][$a]}}" name="{{$input['name'][$a]}}"  value="{{$input['value'][$a]}}" placeholder="{{$input['placeholder'][$a]}}" class="form-control {{$input['name'][$a].'tambah'}}" oninvalid="this.setCustomValidity('Tambahkan @ pada email')"></div>
               </div>
            @endfor
        @endif
        @if(isset($select))
            @for($a=0;$a<=count($select['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$select['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7">
                <select name="{{$select['name'][$a]}}" class="form-control" id="{{$select['name'][$a].'ubah'}}">
                @for($i=0;$i<=count($select['value'][$select['name'][$a]])-1;$i++)
                     <option value="{{$select['value'][$select['name'][$a]][$i]}}">{{$select['value'][$select['name'][$a]][$i]}}</option>
                @endfor
                </select>
               </div>
                </div>
            @endfor
            @endif
       @if(isset($radio))
            @for($a=0;$a<=count($radio['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$radio['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7">
               @for($i=0;$i<=count($radio['value'][$radio['name'][$a]])-1;$i++)
                   <input type="radio" name="{{$radio['name'][$a]}}"  value="{{$radio['value'][$radio['name'][$a]][$i]}}"  class="{{$radio['name'][$a].'tambah'}}">&nbsp;{{$radio['value'][$radio['name'][$a]][$i]}}&nbsp;
                   @endfor
              </div>
            </div>
        @endfor
        @endif
        @if(isset($chkbox))
            @for($a=0;$a<=count($chkbox['nama'])-1;$a++)
               <div class="row mb-2">
               <div class="col-3">{{$chkbox['nama'][$a]}}</div>
               <div class="col-1">:</div>
               <div class="col-7">
               @for($i=0;$i<=count($chkbox['value'][$chkbox['name'][$a]])-1;$i++)
                   <input type="checkbox" name="{{$chkbox['name'][$a]}}"  value="{{$chkbox['value'][$chkbox['name'][$a]][$i]}}"  class="{{$chkbox['name'][$a].'tambah'}}">&nbsp;{{$chkbox['value'][$chkbox['name'][$a]][$i]}}&nbsp;
                   @endfor
                </div>
               </div>
            @endfor
 @endif
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
</form>
    </div>
  </div>
</div>
@endif

@if(isset($validasi))
<div class="modal fade" id="validasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Apakah Anda Akan Memvalidasi Data Ini
      </div>
      <div class="modal-footer">
       <a class="Tolak" > <button type="submit" class="btn btn-danger">Tolak</button></a>
       <a class="Terima"> <button type="submit" class="btn btn-primary">Terima</button></a>
      </div>
</form>
    </div>
  </div>
</div>
@endif
@endsection

@section('js')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
$(document).ready(function(){
@yield('script')
function tambah(){
  $('.tambah').click(function () {
        $("#tambah").modal('show');
    })
  }

function tampilTabel(){
    $(".table").DataTable({
        "language": {
            "emptyTable": "Tidak ada data untuk ditampilkan",
            'paginate': {
                'previous': '<span class="prev-icon">Sebelumnya</span>',
                'next': '<span class="next-icon">Berikutnya</span>'
            },
            "zeroRecords": "Data tidak ditemukan",
            "lengthMenu": "Menampilkan _MENU_ data",
            "infoEmpty":  "Menampilkan data ke- 0 sampai 0 dari 0 entri",
            "info": "Menampilkan data  ke- _START_ sampai _END_ dari _TOTAL_ entri",
            "search":         "Cari:",
        },
    "ajax": alamat+'/tampil',
    "columns" : data
    })
}

// function lulus(){
//     $('.cek').click(function () {
//         $.ajax({
//         url: alamat+'/cek',
//         })
//     })
// }

function validasi(){
$('body').on('click','.validasi',function(){
    $('.tolak').attr('href',$alamat+'/'+this.id+'/'+'-1');
    $('.terima').attr('href',$alamat+'/'+this.id+'/'+'1');
    $('#validasi').modal('show');
})
}

$("ul.nav-tabs a").click(function (e) {
  e.preventDefault();
    $(this).tab('show');
});

function ubah(){
    $('body').on('click','.ubah',function(){
        $.ajax({
            url:  alamat+'/detail/'+this.id,
            success: function(result){
            for(i=0;i<form.length;i++){
                $('.'+form[i]+'ubah').val(result[0][form[i]]);
                console.log(result[0][form[i]]);
            }
          }
        });
        $('.url_ubah').attr('action',alamat+'/ubah/'+this.id);
        $('#ubah').modal('show');
    });
  }

function unduh() {
    $('body').on('click','.unduh',function(){
        $.ajax({
        url: alamat+'/unduh/'+this.id
        })
    });
}

function detail(){
    $('body').on('click','.detail',function(){
        url_ubah=alamat+'/'+this.id;
        $.ajax({
            url: url_ubah,
            success: function(result){
            for(i=0;i<form.length;i++){
                $('.'+form[i]+'detail').value(result[0][form[i]]);
            }
          }
        });
        $('#detail').modal('show');
    });
  }

function hapus(){
    $('body').on('click','.hapus',function(){
        $('.url_hapus').attr('href',alamat+'/hapus/'+this.id)
        $('#hapus').modal('show');
    });
}
  });

</script>
@endsection

