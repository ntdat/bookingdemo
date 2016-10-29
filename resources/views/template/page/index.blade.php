@extends('template.master')
@section('content')
    <!-- slider -->
    @include('template.block.slider');
    <!--//slider-->

    <!--main search-->
    @include('template.block.search',$offer)
    <!--// main search-->

    <!--main-->
    <div class="main" role="main">
        <div class="wrap clearfix">
            <!--latest offers-->
            @include('template.block.offer',$offer)
            <!--//latest offers-->

            <!--hotel-->
            @include('template.block.hotelofindex',$hotel)
            <!--//hotel-->

            <!--car-->
            @include('template.block.car',$car)
            <!--//car-->

            <!--top destinations-->
            @include('template.block.destinations',$tour)
            <!--//top destinations-->

        </div>
    </div>
    <!--//main-->

@endsection