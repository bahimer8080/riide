@extends('layouts.app')

@section('content')
<div id="role_panel" class="position-fixed w-100 h-100 bg-light fixed-top px-5">
    <div class="position-absolute w-100 h-100 bg-light fixed-top  px-5">
    

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{ asset('img/logo.png') }}" width="150" class="my-5 " alt="">
        </div>
        <div class="col-12">
            <h3 class="text-center text-grey font-weight-bold pb-5"  style="font-family: 'Roboto', sans-serif;">{{ __("data.register") }}</h3>
        </div>
        <div class="col-md-4 col-sm-12">
            <button data-role="1" style="font-size: 18px ;font-family: 'Roboto', sans-serif;" class="btn btn-primary btn-block mt-md-2 role"> <i class="fas fa-user-alt"></i> Usuario</button>
            <div class="text-grey text-center w-100 mt-2" style="font-family: 'Roboto', sans-serif;">Consigue lo que quieras</div>
        </div>
        <div class="col-md-4 col-sm-12">
            <button data-role="3" style="font-size: 18px ;font-family: 'Roboto', sans-serif;" class="btn btn-primary btn-block mt-md-2 role"> <i class="fas fa-motorcycle"></i> Rider</button>
            <div class="text-grey text-center w-100 mt-2" style="font-family: 'Roboto', sans-serif;">Crezcamos juntos</div>
        </div>
        <div class="col-md-4 col-sm-12">
            <button data-role="2" style="font-size: 18px ;font-family: 'Roboto', sans-serif;" class="btn btn-primary btn-block mt-md-2 role"> <i class="fas fa-store"></i> Asociado</button>
            <div class="text-grey text-center w-100 mt-2" style="font-family: 'Roboto', sans-serif;">Gana dinero!</div>
        </div>
    </div>
    </div>
    
</div>
<script>
$(".role").on("click",function(){
    console.log( $(this) );
    localStorage.setItem("role_id", $(this).attr("data-role") );
    window.location.href = "/register"
    //$("input[name=role_id]").val( $(this).attr("data-role") );
    //$("#role_panel").css("display","none");
})
</script>
@endsection