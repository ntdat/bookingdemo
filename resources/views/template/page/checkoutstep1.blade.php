@extends('template.master')
@section('content')
    <div class="main" role="main">
        <div class="wrap clearfix">
            <!--main content-->
            <div class="content clearfix">
                <!--breadcrumbs-->
                <nav role="navigation" class="breadcrumbs clearfix">
                    <!--crumbs-->
                    <ul class="crumbs">
                        <li><a href="#" title="Home">Home</a></li>
                        <li><a href="#" title="Hotels">Hotels</a></li>
                        <li><a href="#" title="United Kingdom">United Kingdom</a></li>
                        <li><a href="#" title="London">London</a></li>
                        <li>Best ipsum hotel</li>
                    </ul>
                    <!--//crumbs-->

                    <!--top right navigation-->
                    <ul class="top-right-nav">
                        <li><a href="#" title="Back to results">Back to results</a></li>
                        <li><a href="#" title="Change search">Change search</a></li>
                    </ul>
                    <!--//top right navigation-->
                </nav>
                <!--//breadcrumbs-->

                <!--three-fourth content-->
                <section class="three-fourth">
                    <form id="booking1" method="post" action="booking-step2.html" class="booking">
                        <fieldset>
                            <h3><span>01 </span>Traveller info</h3>
                            <div class="row twins">
                                <div class="f-item">
                                    <label for="first_name">First name</label>
                                    <input type="text" id="first_name" name="first_name" />
                                </div>
                                <div class="f-item">
                                    <label for="last_name">Last name</label>
                                    <input type="text" id="last_name" name="last_name" />
                                </div>
                            </div>

                            <div class="row twins">
                                <div class="f-item">
                                    <label for="email">Email address</label>
                                    <input type="email" id="email" name="email" />
                                </div>
                                <div class="f-item">
                                    <label for="confirm_email">Confirm email address</label>
                                    <input type="text" id="confirm_email" name="confirm_email" />
                                </div>
                                <span class="info">You�ll receive a confirmation email</span>
                            </div>

                            <div class="row twins">
                                <div class="f-item">
                                    <label for="address">Street Address an Number</label>
                                    <input type="text" id="address" name="address" />
                                </div>
                                <div class="f-item">
                                    <label for="city">Town / City</label>
                                    <input type="text" id="city" name="city" />
                                </div>
                            </div>
                            <div class="row twins">
                                <div class="f-item">
                                    <label for="zip">ZIP Code</label>
                                    <input type="text" id="zip" name="zip" />
                                </div>
                                <div class="f-item">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" name="country" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="f-item">
                                    <label>Special requirements: <span>(Not Guaranteed)</span></label>
                                    <textarea rows="10" cols="10"></textarea>
                                </div>
                                <span class="info">Please write your requests in English.</span>
                            </div>
                            <input type="submit" class="gradient-button" value="Proceed to next step" id="next-step" />
                        </fieldset>
                    </form>
                </section>
                <!--//three-fourth content-->

                <!--right sidebar-->
                <aside class="right-sidebar">
                    <!--Booking details-->

                    <?php $total = 0;$hotel = array(); $stt=0;?>
                    <article class="booking-details clearfix">
                    @foreach($carts as  $item)
                    <?php
                        if($item->options['type'] == "bookhotel"){
                        if(!in_array($item->id,$hotel)){
                            if($hotel !=null){
                                echo "<hr/>";
                            }
                            $hotel[]=$item->id;

                        ?>

                        <?php $name = explode(",",$item->name) ?>
                        <h1>{!! $name[0]  !!}
							<span class="stars">
                                @for($i=0;$i<$item->price;$i++)
                                    <img src="{!! URL('public/template/images/ico/star.png') !!}" alt="" />
                                @endfor
							</span>
                        </h1>
                        <span class="address">{!! $name[1] !!}</span>
                        <span class="rating"> 8 /10</span>
                            <div class="booking-info">
                        <?php
                        }

                        ?>
                            <?php $total += $item->options['price']; ?>
                            <h6 style="color:#5FC8C2">Room {!! ++$stt !!}</h6>
                            <p>{!! $item->options['roomname'] !!}</p>
                                <h6>Check-in Date</h6>
                                <p>{!! $item->options['checkin'] !!}</p>
                                <h6>Check-out Date</h6>
                                <p>{!! $item->options['checkout'] !!}</p>

                            <p>{!! Count($item->options['detail']) !!} night, {!! Count($item->options['detail']) -1 !!} night, max. {!! $item->options['person'] !!} people. </p>
                            <h6>Price: $ {!! $item->options['price'] !!}</h6>
                        <?php
                            }else
                            {?>
                            <?php $total += $item->price; ?>
                            <h1>Car</h1>
                            <h6>{!! $item->name !!}</h6>
                            <h6>Check-in Date</h6>
                            <p>{!! $item->options['checkin'] !!}</p>
                            <h6>Check-out Date</h6>
                            <p>{!! $item->options['checkout'] !!}</p>
                            <h6>Price: $ {!! $item->price !!}</h6>

                        <?php
                            }
                        ?>


                    @endforeach
                          @if(count($carts) !=null)
                            </div>
                            <div class="price">
                                <p class="total">Total: $ {!! $total.",00" !!}</p>
                                <p>VAT (20%) included</p>
                            </div>
                            </article>
                          @endif
                    <!--//Booking details-->

                    <!--Need Help Booking?-->
                    <article class="default clearfix">
                        <h2>Need Help Booking?</h2>
                        <p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
                        <p class="number">1- 555 - 555 - 555</p>
                    </article>
                    <!--//Need Help Booking?-->
                </aside>
                <!--//right sidebar-->
            </div>
            <!--//main content-->
        </div>
    </div>
@endsection