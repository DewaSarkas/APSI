@extends('adminlte::page')

@section('content')
<button type="button" class="btn btn-primary tambah" id="tambah">Tambah</button>
<button type="button" class="btn btn-secondary ubah">Ubah</button>
{{-- @if($hapus==1) --}}
<button type="button" class="btn btn-success hapus">Hapus</button>
{{-- @endif --}}
<div class="modal tambah" tabindex="-1" role="dialog" id="ModalTambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $("#tambah").click(function(){
                $("#ModalTambah").modal();
            })
        })
        $hapus = 1;
    </script>
@endsection