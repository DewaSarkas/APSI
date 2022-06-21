@extends('layouts.app')

@section('title','Pengelolaan Data Mahasiswa Asing')
@section('bd')
<section class="content">
    @section('header', 'Beranda')
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mahasiswa</span>
              <span class="info-box-number">
                {{ $mahasiswa }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->

        <!-- /.col -->
        <div class="col-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-graduate"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Alumni</span>
              <span class="info-box-number">{{$alumni}}</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="clearfix hidden-md-up"></div>

        <div class="col-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Assesor</span>
              <span class="info-box-number">{{$assesor}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
        <div class="row">
        <div class="col-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Dosen</span>
                <span class="info-box-number">
                  {{ $dosen }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mitra</span>
                <span class="info-box-number">
                  {{ $mitra }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Dokumen</span>
                <span class="info-box-number">
                  {{ $dokumen }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

      </div>
      <!-- /.row -->

    </div><!--/. container-fluid -->
  </section>
@endsection
