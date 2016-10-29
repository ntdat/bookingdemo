@extends('template.master')
@section('content')
    <div class="main" role="main">
        <div class="wrap clearfix">
            <div class="content clearfix">
                <!--breadcrumbs-->
                <nav role="navigation" class="breadcrumbs clearfix">
                    <!--crumbs-->
                    <ul class="crumbs">
                        <li><a href="#" title="Home">Home</a></li>
                        <li><a href="#" title="Hotels">Hotels</a></li>
                        <li><a href="#" title="United Kingdom">United Kingdom</a></li>
                        <li><a href="#" title="London">London</a></li>
                        <li>Search results</li>
                    </ul>
                    <!--//crumbs-->

                    <!--top right navigation-->
                    <ul class="top-right-nav">
                        <li><a href="search_results.html" title="Back to results">Back to results</a></li>
                        <li><a href="#" title="Change search">Change search</a></li>
                    </ul>
                    <!--//top right navigation-->
                </nav>

                <section class="full-width">
                    <article class="static-content" >

                        <h1>Cart</h1>
                        <?php
                        $total = 0;
                        if(count($carts)==null){
                            echo "<p>Your cart is currently empty.</p>";
                        }else{
                        ?>
                            <table id="mycart">
                                <thead>
                                <tr>
                                    <th>Delete</th>
                                    <th >Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}" >

                        @foreach($carts as $item)

                            @if($item->options['type']=='bookhotel')
                                    <?php  $total +=$item->options['price']?>
                                    <div diplay="none;" id="frontend{!! $item->options['roomid'] !!}"> </div>
                                    <a href="javascript:void(0)" class="gradient-button" style="display:none;margin-left: 30px;" id="hdcalendar{!! $item->options['roomid'] !!}"  title="Close Calendar">Close</a><br/>
                                <tr>
                                    <td><a  href="Javascript:void(0)" class="btn btn-danger btn-circle  "><i data-rowid="{!! $item->rowid !!}" class=" mydelete fa fa-times circle"></i> </a></td>

                                    <td>
                                        <?php
                                            $hotel = \App\Hotel::find($item->id);
                                            $img = json_decode($hotel->images);
                                            $img = (array)$img;
                                            $imgname = reset($img);
                                        ?>
                                           <a href=""><img id="myimg" width="100px" height="70px" src="{!! asset('resources/upload/imagehotel/'.$imgname) !!}"/></a>
                                    </td>
                                    <td>
                                       <span id="myorder">
                                            <h6 ><?php $namehotel = explode(",",$item->name);echo reset($namehotel)?></h6>
                                           {!!$item->options['roomname']."<br/>" !!}
                                           Max Person: {!!$item->options['person']."<br/>" !!}
                                           From {!! $item->options['checkin'] !!} to {!! $item->options['checkout'] !!}
                                           <a href="javascript:void(0)" class="gradient-button calendar" data-id="{!! $item->options['roomid'] !!}" data-type="{!! $item->options['type'] !!}" data-rowid="{!! $item->rowid !!}" title="Select Date">Change</a><br/>
                                       </span>
                                    </td>
                                    <td id="input" ><span class="myinput"><input class="qtyinput" type="text" data-rowid="{!! $item->rowid !!}"   name="spinner{!! $item->options['roomid'] !!}" data-type="{!! $item->options['type']!!}" value="{!! $item->qty !!}"></span></td>
                                    <td ><span class="myprice">${!! $item->options['price']!!}</span></td>
                                </tr>
                        @else
                                <?php  $total +=$item->price?>
                                <div diplay="none;" id="frontend{!! $item->id !!}"> </div>
                                <tr>
                                    <td><a  href="Javascript:void(0)" class="btn btn-danger btn-circle  "><i data-rowid="{!! $item->rowid !!}" class=" mydelete fa fa-times circle"></i> </a></td>

                                    <td>
                                        <?php
                                        $car = \App\Car::find($item->id);
                                        $img = json_decode($car->images);
                                        $img = (array)$img;
                                        $imgname = reset($img);
                                        ?>
                                        <a href=""><img id="myimg" width="100px" height="70px" src="{!! asset('resources/upload/imagecar/'.$imgname) !!}"/></a>
                                    </td>
                                    <td>
                                       <span id="myorder">
                                            <h6 ><?php $namehotel = explode(",",$item->name);echo reset($namehotel)?></h6>
                                           {!!$item->name."<br/>" !!}
                                           From {!! $item->options['checkin'] !!} to {!! $item->options['checkout'] !!}
                                           <a href="javascript:void(0)" class="gradient-button calendar" data-id="{!! $item->id !!}" data-type="{!! $item->options['type'] !!}" data-rowid="{!! $item->rowid !!}" title="Select Date">Change</a><br/>
                                       </span>
                                    </td>
                                    <td id="input" ><span class="myinput"><input class="qtyinput" type="text" data-rowid="{!! $item->rowid !!}" data-type="{!! $item->options['type'] !!}"    name="spinner{!! $item->id !!}" value="{!! $item->qty !!}"></span></td>
                                    <td ><span class="myprice">${!! $item->price!!}</span></td>
                                </tr>
                        @endif
                                @endforeach
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="2" id="lol"><h6>Cart Total: ${!! $total !!} </h6> </td>
                                </tr>
                                <tr>
                                    <td colspan="6"><a style="float: right" href="{!! route('template.checkoutstep1') !!}" class="gradient-button calendar" title="Check out">Check out</a><br/></td>
                                </tr>

                                </tbody>
                            </table>
                        <?php
                        }
                            ?>
                    </article>
                </section>
            </div>
        </div>
    </div>

    <style>
            #mycart tr th
        {
                text-align: center;
        }
        #mycart tr td span#myorder
        {
            float:left;
        }
        #mycart tr td a i.mydelete {
            color: red;
            font-size: 25px;
            text-align: center;
            line-height: 70px;
        }
        #mycart tr td a i.mydelete
        {
            float:left;


        }
        #mycart tr td  img#myimg
        {
            margin-right: -70px;

        }
        #mycart tr td span.myprice
        {

            vertical-align: 35px;

        }
        #mycart tr td#input
        {
            width: 140px;

        }
        #mycart tr td#input .myinput
        {
            float: left;
            display: block;
            height: 55px;

        }
            #mycart tr td#input .myinput input
        {
            width: 60%;
            margin-left: 20px;
        }

    </style>
@endsection