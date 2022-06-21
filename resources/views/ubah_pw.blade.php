@extends('layouts.app')
@section('css')
@endsection
@section('title','Ubah Kata Sandi')
@section('bd')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Ubah Kata Sandi</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <p>Gunakan kolom isian di bawah untuk mengubah kata sandi.</p>
                <form method="post" id="passwordForm" action="/ubah_pw/{{$id}}">
                    @csrf
                    <input type="password" class="input-lg form-control" name="password1" id="password1"
                        placeholder="Kata Sandi Baru" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-6">
                            <span id="8char" class="fas fa-times" style="color:#FF0004;"></span> 6 Karakter<br>
                        </div>
                    </div>
                    <input type="password" class="input-lg form-control" name="password2" id="password2"
                        placeholder="Ulang Kata Sandi" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12">
                            <span id="pwmatch" class="fas fa-times" style="color:#FF0004;"></span> Kata Sandi Sama
                        </div>
                    </div>
                    <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg"
                        data-loading-text="Changing Password..." value="Ubah Kata Sandi">
                </form>
            </div>
            <!--/col-sm-6-->
        </div>
        <!--/row-->
    </div>
@endsection
@section('script')
$("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");

	if($("#password1").val().length >= 6){
		$("#8char").removeClass("fas fa-times");
		$("#8char").addClass("fas fa-check");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("fas fa-check");
		$("#8char").addClass("fas fa-times");
		$("#8char").css("color","#FF0004");
	}

	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("fas fa-times");
		$("#ucase").addClass("fas fa-check");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("fas fa-check");
		$("#ucase").addClass("fas fa-times");
		$("#ucase").css("color","#FF0004");
	}

	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("fas fa-times");
		$("#lcase").addClass("fas fa-check");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("fas fa-check");
		$("#lcase").addClass("fas fa-times");
		$("#lcase").css("color","#FF0004");
	}

	if(num.test($("#password1").val())){
		$("#num").removeClass("fas fa-times");
		$("#num").addClass("fas fa-check");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("fas fa-check");
		$("#num").addClass("fas fa-times");
		$("#num").css("color","#FF0004");
	}

	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("fas fa-times");
		$("#pwmatch").addClass("fas fa-check");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("fas fa-check");
		$("#pwmatch").addClass("fas fa-times");
		$("#pwmatch").css("color","#FF0004");
	}
});
@endsection
