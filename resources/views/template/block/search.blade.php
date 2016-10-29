<!--search-->
<div class="main-search">
    <form id="main-search" method="post" action="{!! route('template.mainsearch') !!}">
        <!--column-->
        <input hidden name="_token" value="{!! csrf_token() !!}">
        <div class="column radios">
            <h4><span>01</span> What?</h4>
            <div class="f-item" >
                <input type="radio" name="radio" id="hotel" value="form1" />
                <label for="hotel">Hotel</label>
            </div>
            <div class="f-item">
                <input type="radio" name="radio" id="Tour" value="form2" />
                <label for="Tour">Tour</label>
            </div>

            <div class="f-item">
                <input type="radio" name="radio" id="rent_a_car" value="form6" />
                <label for="rent_a_car">Rent a Car</label>
            </div>
        </div>
        <!--//column-->

        <div class="forms">
            <!--form hotel-->
            <div class="form" id="form1">
                <!--column-->
                <div class="column">
                    <h4><span>02</span> Where?</h4>
                    <div class="f-item">
                        <label for="destination2">Your destination</label>
                        <select name="where1">
                            @foreach($tour as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--//column-->

                <!--column-->
                <div class="column twins">
                    <h4><span>03</span> When?</h4>
                    <div class="f-item datepicker">
                        <label for="datepicker1">Check-in date</label>
                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="datepicker1" /></div>
                    </div>
                    <div class="f-item datepicker">
                        <label for="datepicker2">Check-out date</label>
                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="datepicker2" /></div>
                    </div>
                </div>
                <!--//column-->

                <!--column-->
                <div class="column triplets">
                    <h4><span>04</span> Who?</h4>
                    <div class="f-item spinner">
                        <label for="spinner1">Rooms</label>
                        <input type="text" placeholder="" id="spinner1" name="spinner1" />
                    </div>
                    <div class="f-item spinner">
                        <label for="spinner2">Adults</label>
                        <input type="text" placeholder="" id="spinner2" name="spinner1" />
                    </div>
                    <div class="f-item spinner">
                        <label for="spinner3">Children</label>
                        <input type="text" placeholder="" id="spinner3" name="spinner1" />
                    </div>
                </div>
                <!--//column-->
            </div>
            <!--//form hotel-->

            <!--form self catering-->
            <div class="form" id="form2">
                <!--column-->
                <div class="column">
                    <h4><span>02</span> Where?</h4>
                    <div class="f-item">
                        <label for="destination1">Your destination</label>
                        <select name="where2">
                            @foreach($offer as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!--//column-->

                <!--column-->
                <div class="column twins">
                    <h4><span>03</span> When?</h4>
                    <div class="f-item datepicker">
                        <label for="datepicker1">Check-in date</label>
                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker4" name="datepicker4" /></div>
                    </div>
                    <div class="f-item datepicker">
                        <label for="datepicker2">Check-out date</label>
                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker5" name="datepicker5" /></div>
                    </div>
                </div>
                <!--//column-->

                <!--column-->
                <div class="column twins last">
                    <h4><span>04</span> Who?</h4>
                    <div class="f-item spinner">
                        <label for="spinner1">Guests</label>
                        <input type="text" placeholder="" id="spinner4" name="spinner4" />
                    </div>
                    <div class="f-item spinner">
                        <label for="spinner2">Bedrooms</label>
                        <input type="text" placeholder="" id="spinner5" name="spinner5" />
                    </div>
                </div>
                <!--//column-->
            </div>
            <!--//form self catering-->




            <!--form rent a car-->
            <div class="form" id="form6">
                <!--column-->
                <div class="column">
                    <h4><span>02</span> Where?</h4>
                    <div class="f-item">
                        <label for="destination7">Your destination</label>
                        <select name="where6">
                            @foreach($tour as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--//column-->

                <!--column-->
                <div class="column two-childs">
                    <h4><span>03</span> When?</h4>
                    <div class="f-item datepicker">
                        <label for="datepicker11">Pick up time</label>
                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker11" name="datepicker11" /></div>
                        <select name="timepickup">
                            @for($i=0;$i<24;$i++)
                                @if($i<10)
                                    <option value="{!! $i !!}" >0{!! $i !!}:00</option>
                                @else
                                    <option value="{!! $i !!}" @if($i==10){!! "selected" !!} @endif  >{!! $i !!}:00</option>
                                @endif
                            @endfor
                        </select>
                    </div>

                </div>
                <div class="column two-childs">
                    <h4><span>&nbsp;</span> &nbsp;</h4>

                    <div class="f-item datepicker">
                        <label for="datepicker12">Drop of time</label>
                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker12" name="datepicker12" /></div>
                        <select name="timedrop">
                            @for($i=0;$i<24;$i++)
                                @if($i<10)
                                    <option value="{!! $i !!}" >0{!! $i !!}:00</option>
                                @else
                                    <option value="{!! $i !!}" @if($i==10){!! "selected" !!} @endif  >{!! $i !!}:00</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <!--//column-->

                <!--column-->

                <!--//column-->
            </div>
            <!--//form rent a car-->
        </div>
        <input type="submit" value="Proceed to results" name="mainsearch" class="search-submit" id="search-submit" />
    </form>
</div>
<!--//search-->