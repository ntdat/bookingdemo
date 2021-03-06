<section class="destinations clearfix full">
    <h2>Explore our latest offers</h2>
    <!--column-->
    <?php $count= 0; ?>
    @foreach($offer as $item)
        <?php
        ++$count;
        $images = json_decode($item->images);
        $images = (array)$images;
        $first = reset($images);
        ?>
        <article class="one-fourth <?php if(($count%4 )== 0){echo "last"; } ?> ">
                <figure><a href="{!! URL('template/tour',$item->id) !!}" title=""><img src="{!! asset("resources/upload/imagedes/$first") !!}" alt="" width="270" height="152" /></a></figure>
                <div class="details">
                    <h4>{!! $item->name !!}</h4>
                    <a href="#" title="Explore our deals" class="gradient-button">Explore our deals</a>
                </div>
        </article>

        <!--//column-->
    @endforeach

</section>
<!--//top destinations-->