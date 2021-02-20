@extends('layouts.app')

@section('content')
<style>

.search-product {

}

</style>
<div class="header-store w-100 d-flex align-items-end" style="bottom: 0px ; background-image: url('/{{ $store[0]->bg_image }}') ; ">
                <div class="position-md-absolute w-100 d-flex" style="bottom: 0px ; background-image: url('{{ $store[0]->bg_image }}') ; ">
                    <div class="p-3">
                        <img src="{{ asset( $store[0]->image ) }}" class="pb-0" width="50" height="50" style="" alt="">
                    </div>
                    <div class="w-100">
                        <p class="text-white text-weight-bold pt-3 pb-0" style="font-weight: bold ;">{{ $store[0]->name }}
                        <span id="open" style="display: none ;" class="badge badge-success text-black mx-2"> <i class="fas fa-circle"></i>  {{ __("data.open") }} </span>
                        <span id="close" style="display: none ;" class="badge badge-danger text-black mx-2"> <i class="fas fa-circle"></i>  {{ __("data.close") }} </span>
                        <span class="badge badge-light text-black mx-2"> {{ $store[0]->time_delivery }} </span>
                        <br> 
                        <span>
                            <i class="fa fa-star"></i> @if( $score_count > 0 ) {{ $score_sum / $score_count }} @else 0 @endif @foreach( $categories as $c ) {{ " - " .$c->name}} @endforeach
                        </span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                      
                    </div>
                </div>
            </div>
<div class="container p-0">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">

            

        </div>
        <div class="col-12 d-flex justify-content-center">
        
          <div class="form-group has-search mb-0 py-3" >
            <span class="fa fa-search form-control-feedback pl-5"></span>
            <input type="text" class="form-control text-center search-product pr-5" style="border-radius: 25px ;" placeholder="Search">
          </div>
        </div>

        @foreach( $products as $p )
        <div class="col-md-3 col-sm-6">
          <a href="/product/{{ $p->id }}" class="card p-2 w-100" style="border-radius: 20px ;text-decoration: none ;">
            <img src="{{ asset( $p->image ) }}" class="card-img-top" alt="...">
            <div class="card-body py-0 px-0">
              <div class="w-100 d-flex pb-3">
                <div class="w-100">
                  <h5 class="text-left text-dark pt-2 m-0"> {{ $p->name }} </h5>
                </div>
                <div class="w-100">
                  <h5 class="text-dark text-right font-weight-bold pt-2 m-0"> {{ $p->price_a }} </h5>                           
                </div>
              </div>
              <div class="w-100 mt-3 d-flex justify-content-center">
                <button class="btn btn-primary btn-sm mx-1">-</button>
                <input type="number" class="mx-1" style="width: 50px ; height: 28px ;">
                <button class="btn btn-primary btn-sm mx-1">+</button>
              </div>                           
            </div>
          </a>
        </div>
        @endforeach

    </div>
</div>
<!--
<div class="container p-0">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
            <div class="card-store w-100 bg-light" style="height: 300px ;">
                <div class="position-absolute w-100 bg-danger" style="bottom: 0px ;">fgf</div>
            </div>
        </div>
    </div>
</div>-->
<script>
$(function(){
h = new Date;
m = new Date;
//console.log( '{{ intval( implode("", explode(":", $store[0]->start ) ) ) }}' , parseInt( h.getHours().toString() + m.getMinutes().toString() ) )
let start = parseInt('{{ intval( implode("", explode(":", $store[0]->start ) ) ) }}');
let end = parseInt('{{ intval( implode("", explode(":", $store[0]->end ) ) ) }}');
let local = parseInt( h.getHours().toString() + m.getMinutes().toString() );
if( local >= start && local <= end ){
  $("#open").css("display","inline-block");
}
else {
  console.log(start,end,local)
  $("#close").css("display","inline-block");
}
})

</script>
@endsection
