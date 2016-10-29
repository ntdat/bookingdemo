<!--deals-->
<section class="deals clear-fix full">
    <h2>Most popular Hotels</h2>
    <div class="deals clearfix">
        <!--deal-->
        @foreach($hotel as $item)
        <article class="one-fourth">
            <?php
                $images = json_decode($item->images);
                $images = (array)$images;
                $first = reset($images);
            ?>
            <figure><a href="{!! route('template.detailHotel',$item->id) !!}" title=""><img src="{!! asset("resources/upload/imagehotel/$first") !!}" alt="" width="270" height="152" /></a></figure>
            <div class="details">
                <h1>{!! str_limit($item->name, $limit = 15, $end = '...') !!}

								<span class="stars">
                                    @for($i = 0;$i < $item->star; $i++)
									<img src="{!! url('public/template/images/ico/star.png') !!}" alt="star" />
                                    @endfor
								</span>

                </h1>
                <span class="address">{!! $item->location !!}<a href="#"><br/>Show on map</a></span>
                <span class="rating"> 8 /10</span>
                <span class="price">Per Room/ 1 Night  <em>$
                        <?php
                        $price = \App\Room::select('price')->where('hotel_id',$item->id)->orderBy('price', 'asc')->get()->first();
                          echo $price['price'];
                        ?>
                    </em> </span>
                <div class="description">
                    {!! str_limit($item->des, $limit = 240, $end = '... ') !!}<a href="{!! route('template.detailHotel',$item->id) !!}">More info</a>
                </div>
                <a href="{!! route('template.detailHotel',$item->id) !!}" title="Book now" class="gradient-button">Book now</a>
            </div>
        </article>
        @endforeach
        <!--//deal-->
    </div>
</section>
<!--//deals-->