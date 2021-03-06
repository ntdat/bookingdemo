@extends('template.master')
@section('content')
    <div class="wrap clearfix">
        <!--main content-->
        <div class="content clearfix">
            <!--breadcrumbs-->
            <nav role="navigation" class="breadcrumbs clearfix">
                <!--crumbs-->
                <ul class="crumbs">
                    <li><a href="#" title="Home">Home</a></li>
                    <li><a href="#" title="Travel guides">Travel guides</a></li>
                    <li>London</li>
                </ul>
                <!--//crumbs-->
            </nav>
            <aside class="left-sidebar">
                <article class="refine-search-results">
                    <h2>Refine search results</h2>
                    <dl>
                        <!--Price (per night)-->
                        <dt class="active">Price (per night)</dt>
                        <dd style="display: block; height: auto;">
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch1"><span class=""><input type="checkbox" id="ch1" name="price"></span></div>
                                <label for="ch1">0 - 49 $</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch2"><span class=""><input type="checkbox" id="ch2" name="price"></span></div>
                                <label for="ch2">50 - 99 $</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch3"><span><input type="checkbox" id="ch3" name="price"></span></div>
                                <label for="ch3">100 -149 $</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch4"><span class=""><input type="checkbox" id="ch4" name="price"></span></div>
                                <label for="ch4">150 - 199 $</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch5"><span><input type="checkbox" id="ch5" name="price"></span></div>
                                <label for="ch5">200 $ +</label>
                            </div>
                        </dd>
                        <!--//Price (per night)-->

                        <!--Accommodation type-->

                        <!--//Accommodation type-->

                        <!--Star rating-->
                        <dt class="active">Star rating</dt>
                        <dd style="display: block; height: auto;">
                            <span class="stars-info">3 or more</span>
                            <div id="star" data-rating="3" style="cursor: pointer;"><input name="score" type="hidden" value="5"></div>
                        </dd>
                        <!--//Star rating-->

                        <!--User rating-->
                        <dt class="active">User rating</dt>
                        <dd style="display: block; height: auto;">
                            <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">

                                </div>
                            <span class="min">0</span><span class="max">10</span>
                        </dd>
                        <!--//User rating-->

                        <!--Hotel facilities-->
                        <dt class="">Hotel facilities</dt>
                        <dd style="display: none; height: auto;">
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch15"><span><input type="checkbox" id="ch15" name="facilities"></span></div>
                                <label for="ch15">Wi-Fi</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch16"><span><input type="checkbox" id="ch16" name="facilities"></span></div>
                                <label for="ch16">Parking</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch17"><span><input type="checkbox" id="ch17" name="facilities"></span></div>
                                <label for="ch17">Airport Shuttle</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch18"><span><input type="checkbox" id="ch18" name="facilities"></span></div>
                                <label for="ch18">Meeting /&nbsp;Banquet Facilities</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch19"><span><input type="checkbox" id="ch19" name="facilities"></span></div>
                                <label for="ch19">Swimming pool</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch20"><span><input type="checkbox" id="ch20" name="facilities"></span></div>
                                <label for="ch20">Restaurant</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch21"><span><input type="checkbox" id="ch21" name="facilities"></span></div>
                                <label for="ch21">Fitness Centre</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch22"><span><input type="checkbox" id="ch22" name="facilities"></span></div>
                                <label for="ch22">SPA &amp; Wellness&nbsp;Centre</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch23"><span><input type="checkbox" id="ch23" name="facilities"></span></div>
                                <label for="ch23">Pets allowed</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch24"><span><input type="checkbox" id="ch24" name="facilities"></span></div>
                                <label for="ch24">Lift</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch25"><span><input type="checkbox" id="ch25" name="facilities"></span></div>
                                <label for="ch25">Air condition</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch26"><span><input type="checkbox" id="ch26" name="facilities"></span></div>
                                <label for="ch26">Family rooms</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch27"><span><input type="checkbox" id="ch27" name="facilities"></span></div>
                                <label for="ch27">Non - smoking rooms</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch28"><span><input type="checkbox" id="ch28" name="facilities"></span></div>
                                <label for="ch28">Rooms/facilities for disabled guests</label>
                            </div>
                        </dd>
                        <!--//Hotel facilities-->

                        <!--Room facilites-->
                        <dt class="">Room facilites</dt>
                        <dd style="display: none; height: auto;">
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch29"><span><input type="checkbox" id="ch29" name="room-facilities"></span></div>
                                <label for="ch29">Bathroom</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch30"><span><input type="checkbox" id="ch30" name="room-facilities"></span></div>
                                <label for="ch30">Cable TV</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch31"><span><input type="checkbox" id="ch31" name="room-facilities"></span></div>
                                <label for="ch31">Air conditioning</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch32"><span><input type="checkbox" id="ch32" name="room-facilities"></span></div>
                                <label for="ch32">Mini bar</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch33"><span><input type="checkbox" id="ch33" name="room-facilities"></span></div>
                                <label for="ch33">Wi - Fi</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch34"><span><input type="checkbox" id="ch34" name="room-facilities"></span></div>
                                <label for="ch34">Wheelchair - friendly room</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch35"><span><input type="checkbox" id="ch35" name="room-facilities"></span></div>
                                <label for="ch35">Pay TV</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch36"><span><input type="checkbox" id="ch36" name="room-facilities"></span></div>
                                <label for="ch36">Desk</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch37"><span><input type="checkbox" id="ch37" name="room-facilities"></span></div>
                                <label for="ch37">Room safe</label>
                            </div>
                        </dd>

                        <dt>Payment options</dt>
                        <dd style="display: none; height: auto;">
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch66"><span><input type="checkbox" id="ch66" name="theme"></span></div>
                                <label for="ch66">American Express</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch67"><span><input type="checkbox" id="ch67" name="theme"></span></div>
                                <label for="ch67">Visa</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch68"><span><input type="checkbox" id="ch68" name="theme"></span></div>
                                <label for="ch68">Euro/Mastercard</label>
                            </div>
                            <div class="checkbox">
                                <div class="checker" id="uniform-ch69"><span><input type="checkbox" id="ch69" name="theme"></span></div>
                                <label for="ch69">Diners Club</label>
                            </div>
                        </dd>
                        <!--//Payment options-->
                    </dl>
                </article>
            </aside>
            <section class="three-fourth">
                <div class="sort-by">
                    <h3>Sort by</h3>
                    <ul class="sort">
                        <li>Popularity <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
                        <li>Price <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
                        <li>Stars <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
                        <li>Rating <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
                    </ul>

                    <ul class="view-type">
                        <li class="grid-view active"><a href="#" title="grid view">grid view</a></li>
                        <li class="list-view"><a href="#" title="list view">list view</a></li>
                        <li class="location-view"><a href="#" title="location view">location view</a></li>
                    </ul>
                </div>

                <div class="deals clearfix">
                    <!--deal-->

                    <!--//deal-->
                @foreach($result as $item)
                    <!--deal-->
                    <?php
                    $images = json_decode($item->images);
                    $images = (array)$images;
                    $first = reset($images);
                    ?>
                    <article class="one-fourth" style="height: 442px;">
                        <figure><a href="{!! route('template.detailHotel',$item->id) !!}" title=""><img src="{!! asset("resources/upload/$link/$first") !!}" alt="" width="270" height="152" /></a></figure>
                        <div class="details">
                            <h1>{!! $item->name !!}
											<span class="stars">
                                                @for($i = 0;$i < $item->star; $i++)
                                                    <img src="{!! url('public/template/images/ico/star.png') !!}" alt="star" />
                                                @endfor
								            </span>
                            </h1>
                            <span class="address">London  �  <a href="#">Show on map</a></span>
                            <span class="rating"> 9 /10</span>
                            <span class="price">Per Room/ 1 Night  <em>$
                                  <?php
                                  $price = \App\Room::select('price')->where('hotel_id',$item->id)->orderBy('price', 'asc')->get()->first();
                                  echo $price['price'];
                                  ?>
                              </em>
                            </span>
                            <div class="description">
                                {!!str_limit($item->des, $limit = 150, $end = '... ') !!}
                                <a href="{!! route('template.detailHotel',$item->id) !!}">More info</a>
                            </div>
                            <a href="{!! route('template.detailHotel',$item->id) !!}" title="Book now" class="gradient-button">Book now</a>
                        </div>

                    </article>
                @endforeach
                    <!--//deal-->
                    <!--bottom navigation-->
                    <div class="bottom-nav">
                        <!--back up button-->
                        <a href="#" class="scroll-to-top" title="Back up">Back up</a>
                        <!--//back up button-->
                        <!--pager-->
                        <div class="pager">
                            <span class="first"><a href="#">First page</a></span>
                            <span><a href="#">&lt;</a></span>
                            <span class="current">1</span>
                            <span><a href="#">2</a></span>
                            <span><a href="#">3</a></span>
                            <span><a href="#">4</a></span>
                            <span><a href="#">5</a></span>
                            <span><a href="#">6</a></span>
                            <span><a href="#">7</a></span>
                            <span><a href="#">8</a></span>
                            <span><a href="#">&gt;</a></span>
                            <span class="last"><a href="#">Last page</a></span>
                        </div>
                        <!--//pager-->
                    </div>
                    <!--//bottom navigation-->
                </div>
            </section>
        </div>
    </div>

@endsection