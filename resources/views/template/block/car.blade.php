<!--deals-->
<section class="deals clearfix full">
    <h2>Top For Rent</h2>
    <div class="deals clearfix">
        <!--deal-->
        @foreach($car as $item)
            <?php
                $images = json_decode($item->images);
                $images = (array)$images;
                $first = reset($images);
            ?>
        <article class="one-fourth">
            <figure><a href="{!! Route('template.detailCar',$item->id) !!}" title=""><img src="{!! asset("resources/upload/imagecar/$first") !!}" alt="" width="270" height="152" /></a></figure>
            <div class="details">
                <h1>{!! $item->name !!}</h1>
                <span class="price">Price per day from  <em>$ {!! $item->price !!}</em> </span>
                <a href="{!! Route('template.detailCar',$item->id) !!}" title="Book now" class="gradient-button">Book now</a>
            </div>
        </article>
        @endforeach
        <!--//deal-->
    </div>
</section>
<!--//deals-->