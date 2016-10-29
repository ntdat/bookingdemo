@extends('template.master');
@section('content')
    <div class="main" role="main">
        <section class="wrap clearfix">
            <section class="content clearfix">
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
                <!--//breadcrumbs-->
                <?php
                        $imgs = json_decode($car->images);
                        $imgs = (array)$imgs;
                ?>
                <!--hotel three-fourth content-->
                <section class="three-fourth">
                    <!--gallery-->
                    <section class="gallery" id="crossfade">
                        @foreach($imgs as $img)
                        <img src="{!! asset('resources/upload/imagecar/'.$img) !!}" alt="" width="850" height="531" />
                        @endforeach
                        />
                    </section>
                    <!--//gallery-->

                    <!--inner navigation-->
                    <nav class="inner-nav">
                        <ul>
                            <li class="description"><a href="#description" title="Description">Description</a></li>
                            <li class="reviews"><a href="#reviews" title="Reviews">Reviews</a></li>
                        </ul>
                    </nav>
                    <!--//inner navigation-->

                    <!--description-->
                    <section id="description" class="tab-content">
                        <article>
                            <h1>General</h1>
                            <div class="text-wrap">
                                <p>{!! $car->des !!}</p>
                                <a href="javascript:void(0)" class="gradient-button calendar" data-type="bookcar" data-id="{!! $car->id !!}"  title="Select Date">Select Date</a><br/>
                            </div>
                            <div style="padding-top:200px" id="frontend{!! $car->id !!}" display="none";></div>
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
                        </article>

                    </section>
                    <!--reviews-->
                    <section id="reviews" class="tab-content">
                        <article>
                            <h1>Hotel Score and Score Breakdown</h1>
                            <div class="score">
                                <span class="achieved">8 </span>
                                <span> / 10</span>
                                <p class="info">Based on 782 reviews</p>
                                <p class="disclaimer">Guest reviews are written by our customers <strong>after their stay</strong> at Hotel Best Ipsum.</p>
                            </div>

                            <dl class="chart">
                                <dt>Clean</dt>
                                <dd><span id="data-one" style="width:80%;">8&nbsp;&nbsp;&nbsp;</span></dd>
                                <dt>Comfort</dt>
                                <dd><span id="data-two" style="width:60%;">6&nbsp;&nbsp;&nbsp;</span></dd>
                                <dt>Location</dt>
                                <dd><span id="data-three" style="width:80%;">8&nbsp;&nbsp;&nbsp;</span></dd>
                                <dt>Staff</dt>
                                <dd><span id="data-four" style="width:100%;">10&nbsp;&nbsp;&nbsp;</span></dd>
                                <dt>Services</dt>
                                <dd><span id="data-five" style="width:70%;">7&nbsp;&nbsp;&nbsp;</span></dd>
                                <dt>Value for money</dt>
                                <dd><span id="data-six" style="width:90%;">9&nbsp;&nbsp;&nbsp;</span></dd>
                            </dl>
                        </article>

                        <article>
                            <h1>Guest reviews</h1>
                            <ul class="reviews">
                                <!--review-->
                                <li>
                                    <figure class="left"><img src="images/uploads/avatar.jpg" alt="avatar" /></figure>
                                    <address><span>Anonymous</span><br />Solo Traveller<br />Norway<br />22/06/2012</address>
                                    <div class="pro"><p>It was a warm friendly hotel. Very easy access to shops and underground stations. Staff very welcoming.</p></div>
                                    <div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>
                                </li>
                                <!--//review-->

                                <!--review-->
                                <li>
                                    <figure class="left"><img src="images/uploads/avatar.jpg" alt="avatar" /></figure>
                                    <address><span>Anonymous</span><br />Solo Traveller<br />Norway<br />22/06/2012</address>
                                    <div class="pro"><p>It was a warm friendly hotel. Very easy access to shops and underground stations. Staff very welcoming.</p></div>
                                    <div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>
                                </li>
                                <!--//review-->

                                <!--review-->
                                <li>
                                    <figure class="left"><img src="images/uploads/avatar.jpg" alt="avatar" /></figure>
                                    <address><span>Anonymous</span><br />Solo Traveller<br />Norway<br />22/06/2012</address>
                                    <div class="pro"><p>It was a warm friendly hotel. Very easy access to shops and underground stations. Staff very welcoming.</p></div>
                                    <div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>
                                </li>
                                <!--//review-->

                                <!--review-->
                                <li>
                                    <figure class="left"><img src="images/uploads/avatar.jpg" alt="avatar" /></figure>
                                    <address><span>Anonymous</span><br />Solo Traveller<br />Norway<br />22/06/2012</address>
                                    <div class="pro"><p>It was a warm friendly hotel. Very easy access to shops and underground stations. Staff very welcoming.</p></div>
                                    <div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>
                                </li>
                                <!--//review-->

                                <!--review-->
                                <li>
                                    <figure class="left"><img src="images/uploads/avatar.jpg" alt="avatar" /></figure>
                                    <address><span>Anonymous</span><br />Solo Traveller<br />Norway<br />22/06/2012</address>
                                    <div class="pro"><p>It was a warm friendly hotel. Very easy access to shops and underground stations. Staff very welcoming.</p></div>
                                    <div class="con"><p>noisy neigbourghs spoilt the rather calm environment</p></div>
                                </li>
                                <!--//review-->
                            </ul>
                        </article>
                    </section>
                    <!--//reviews-->

            <!--//hotel content-->
            </section>

        </section>
    </div>
    </div>
@endsection