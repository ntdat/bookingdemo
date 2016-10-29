<section class="destinations clearfix full">
<h2>Top destinations around the world</h2>
<!--column-->
    <?php $count= 0; ?>
    @foreach($tour as $item)
        <?php
        ++$count;
        $images = json_decode($item->images);
        $images = (array)$images;
        $first = reset($images);
        ?>
        <article class="one-fourth <?php if(($count%4 )== 0){echo "last"; } ?> ">

            <figure><a href="{!! URL('template/tour',$item->id) !!}" title=""><img src="{!! asset("resources/upload/imagetour/$first") !!}" alt="" width="270" height="152" /></a></figure>
            <div class="details">
                <a href="{!! URL('template/tour',$item->id) !!}" title="View all" class="gradient-button">View all</a>
                <h5>{!! $item->name !!}</h5>
                <span class="count">
                    <?php
                    $hotel = \App\Hotel::select('id')->where('tour_id',$item->id)->get()->toArray() ;
                   echo $numberhotel = count($hotel) ?> Hotels
                </span>
                <div class="ribbon">
                    <div class="half hotel">
                        <a href="{!! URL('template/tour',$item->id) !!}" title="View all">
                            <span class="small">from</span>
                            <span class="price">&#36;
                                <?php
                                $min = 0;

                              for($i = 0; $i<count($hotel);$i++){
                                  foreach($hotel[$i] as $idhotel){
                                    $price = \App\Room::select('price')->where('hotel_id',$idhotel)->orderBy('price', 'asc')->get()->first();
                                      $min = $price;
                                      if($min < $price){
                                          $min = $price;
                                      }
                                  }

                              }echo $min['price'];
                                ?></span>
                        </a>
                    </div>
                    <div class="half flight">
                        <a href="{!! URL('template/tour',$item->id) !!}" title="View all">
                            <span class="small">from</span>
                            <span class="price">&#36;
                            <?php
                                $mincar = \App\Car::select('price')->where('tour_id',$item->id)->orderBy('price', 'asc')->get()->first();
                                    echo $mincar['price'];
                            ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </article>

<!--//column-->
    @endforeach

</section>
<!--//top destinations-->